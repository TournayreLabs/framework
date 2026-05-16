<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CloneInterface;

/**
 * Trait Clone.
 *
 * @see CloneInterface
 */
trait Clone_
{
    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    public function clone(): self
    {
        return self::of($this->collection->clone());
    }
}
