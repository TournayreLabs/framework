<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OffsetExistsInterface;

/**
 * Trait OffsetExists.
 *
 * @see OffsetExistsInterface
 */
trait OffsetExists
{
    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     */
    public function offsetExists(mixed $key): bool
    {
        return $this->collection->offsetExists($key);
    }
}
