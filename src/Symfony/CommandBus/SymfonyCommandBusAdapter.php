<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\CommandBus;

use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\CommandBus\CommandBusInterface;
use TournayreLabs\Contracts\CommandBus\CommandInterface;

/**
 * Adapter that bridges Symfony's MessageBus to CommandBusInterface.
 */
final readonly class SymfonyCommandBusAdapter implements CommandBusInterface
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function dispatch(CommandInterface $command): void
    {
        try {
            $this->messageBus->dispatch($command);
        } catch (ExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }
}
