<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Common\Traits\ContextTrait;
use TournayreLabs\Contracts\Context\HasContextInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use Psr\EventDispatcher\StoppableEventInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * @deprecated This class is deprecated and will be removed in a future version.
 *             Use the Domain Events Management system with AbstractCommandEvent/AbstractQueryEvent instead.
 */
final class Event implements StoppableEventInterface, HasContextInterface, LoggableInterface
{
    use ContextTrait;

    /**
     * @api
     */
    public function _identifier(): string
    {
        return \spl_object_hash($this);
    }

    private bool $propagationStopped = false;

    /**
     * @api
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * @api
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    /**
     * @api
     */
    public function _type(): string
    {
        return static::class;
    }

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array
    {
        $log = [
            'identifier' => $this->_identifier(),
            'type' => $this->_type(),
        ];

        if (!$this->hasContext()) {
            return $log;
        }

        return $log + [
            'context' => $this->context()->toLog(),
        ];
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function dispatch(MessageBusInterface $messageBus): void
    {
        try {
            $messageBus->dispatch($this);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }
}
