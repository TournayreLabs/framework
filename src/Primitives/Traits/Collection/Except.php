<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ExceptInterface;

/**
 * Trait Except.
 *
 * @see ExceptInterface
 */
trait Except
{
    /**
     * Returns a new map without the passed element keys.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     *
     * @api
     */
    public function except($keys): self
    {
        $except = $this->collection->except($keys);

        return self::of($except);
    }
}
