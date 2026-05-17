<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use TournayreLabs\Common\Persistance\Command\DatabasePersistCommand;
use TournayreLabs\Contracts\Persistance\DatabasePersistHandlerInterface;

/**
 * Handler for DatabasePersistCommand.
 */
#[AsMessageHandler]
final readonly class DatabasePersistHandler implements DatabasePersistHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(DatabasePersistCommand $command): void
    {
        $this->entityManager->persist($command->object());
    }
}
