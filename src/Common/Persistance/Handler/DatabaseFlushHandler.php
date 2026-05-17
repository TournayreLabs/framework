<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use TournayreLabs\Common\Persistance\Command\DatabaseFlushCommand;
use TournayreLabs\Contracts\Persistance\DatabaseFlushHandlerInterface;

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
