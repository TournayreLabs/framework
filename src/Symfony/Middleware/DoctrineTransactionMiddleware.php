<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Middleware;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\HandlerDescriptor;
use Symfony\Component\Messenger\Handler\HandlersLocatorInterface;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;
use TournayreLabs\Contracts\Persistance\AllowFlushInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\String_;

/**
 * Wraps message handling in a Doctrine transaction when a flush-capable handler is present.
 *
 * The middleware logs transaction lifecycle events and rolls back on failure.
 */
final readonly class DoctrineTransactionMiddleware implements MiddlewareInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HandlersLocatorInterface $handlersLocator,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $this->logger->identifiedAs(self::class);

        $shouldApplyTransaction = $this->shouldApplyTransaction($envelope);
        if (!$shouldApplyTransaction) {
            return $stack->next()->handle($envelope, $stack);
        }
        $context = $this->messageContext($envelope);
        $this->logger->start($context);
        $this->logger->debug('Starting transaction for message', $context);

        $this->entityManager->beginTransaction();

        try {
            $envelope = $stack->next()->handle($envelope, $stack);

            $this->logger->debug('Flushing changes', $context);
            $this->entityManager->flush();
            $this->logger->debug('Committing transaction', $context);
            $this->entityManager->commit();
            $this->logger->success($context);
            $this->logger->end($context);

            return $envelope;
        } catch (\Throwable $throwable) {
            $context['exception'] = [
                'class' => $throwable::class,
                'message' => $throwable->getMessage(),
            ];
            $this->logger->exception($throwable, $context);
            $this->rollback();
            $this->logger->failFast($context);
            $this->logger->end($context);

            throw $throwable;
        }
    }

    /**
     * @return array<string, string|null>
     */
    private function messageContext(Envelope $envelope): array
    {
        $message = $envelope->getMessage();

        return [
            'message_class' => $message::class,
            'message_id' => method_exists($message, 'getId') ? $message->getId() : null,
        ];
    }

    private function shouldApplyTransaction(Envelope $envelope): bool
    {
        $handlers = iterator_to_array($this->handlersLocator->getHandlers($envelope));

        return Collection::of($handlers)
            ->filterWith(static fn (mixed $handlerDescriptor): bool => $handlerDescriptor instanceof HandlerDescriptor)
            ->some(static function (mixed $handlerDescriptor): bool {
            /** @var HandlerDescriptor $handlerDescriptor */
            $handlerName = $handlerDescriptor->getName();
            $firstChunk = Collection::of(String_::fromString($handlerName)->split('::'))->first();
            $handlerClass = $firstChunk instanceof String_ ? $firstChunk->toString() : '';
            if ('Closure' === $handlerClass || '' === $handlerClass) {
                return false;
            }

            return is_a($handlerClass, AllowFlushInterface::class, true);
            })->isTrue()
        ;
    }

    private function rollback(): void
    {
        if (!$this->entityManager->getConnection()->isTransactionActive()) {
            return;
        }

        $this->logger->debug('Rolling back transaction');
        $this->entityManager->rollback();
    }
}
