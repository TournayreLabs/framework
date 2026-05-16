<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\SliceInterface;

/**
 * Trait Slice.
 *
 * @see SliceInterface
 */
trait Slice
{
    /**
     * Returns a slice of the map.
     *
     * @param int      $offset Number of elements to start from
     * @param int|null $length Number of elements to return or NULL for no limit
     *
     * @api
     */
    public function slice(int $offset, ?int $length = null): self
    {
        $slice = $this->collection->slice($offset, $length);

        return self::of($slice);
    }
}
