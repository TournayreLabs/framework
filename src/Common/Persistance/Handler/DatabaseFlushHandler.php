<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Handler;

use TournayreLabs\Common\Persistance\Command\DatabaseFlushCommand;
use TournayreLabs\Contracts\Persistance\DatabaseFlushHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

/**
 * Handler for DatabaseFlushCommand.
 */
#[AsMessageHandler]
final readonly class DatabaseFlushHandler implements DatabaseFlushHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(DatabaseFlushCommand $command): void
    {
        $this->entityManager->flush();
    }
}
