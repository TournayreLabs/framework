<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Command;

use TournayreLabs\Common\AbstractCommandEvent;
use TournayreLabs\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to flush all changes to the database.
 */
final class DatabaseFlushCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }
}
