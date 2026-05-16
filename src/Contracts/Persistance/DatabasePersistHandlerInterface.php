<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Persistance;

use TournayreLabs\Common\Persistance\Command\DatabasePersistCommand;

/**
 * Interface for database persist handlers.
 */
interface DatabasePersistHandlerInterface
{
    /**
     * Handles the database persist command.
     */
    public function __invoke(DatabasePersistCommand $command): void;
}
