<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\TakeInterface;

/**
 * Trait Take.
 *
 * @see TakeInterface
 */
trait Take
{
    /**
     * Returns a new map with the given number of items.
     *
     * @param int                                 $size   Number of items to return
     * @param \Closure|int $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    public function take(int $size, \Closure|int $offset = 0): self
    {
        $take = $this->collection->take($size, $offset);

        return self::of($take);
    }
}
