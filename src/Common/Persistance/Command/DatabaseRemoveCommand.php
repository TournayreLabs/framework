<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Persistance\Command;

use TournayreLabs\Common\AbstractCommandEvent;
use TournayreLabs\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to remove an object from the database.
 */
final class DatabaseRemoveCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    private function __construct(private readonly object $object)
    {
    }

    public static function new(object $object): self
    {
        return new self(object: $object);
    }

    public function object(): object
    {
        return $this->object;
    }
}
