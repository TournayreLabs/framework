<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use TournayreLabs\Common\Persistance\Command\DatabaseRemoveCommand;
use TournayreLabs\Contracts\Persistance\DatabaseRemoveHandlerInterface;

/**
 * Handler for DatabaseRemoveCommand.
 */
#[AsMessageHandler]
final readonly class DatabaseRemoveHandler implements DatabaseRemoveHandlerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(DatabaseRemoveCommand $command): void
    {
        $this->entityManager->remove($command->object());
    }
}
