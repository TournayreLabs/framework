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
     * @param int $offset Number of elements to start from
     *
     * @api
     */
    public function slice(int $offset): self
    {
        $slice = $this->collection->slice($offset);

        return self::of($slice);
    }

    /**
     * Returns a slice of the map with a length limit.
     *
     * @param int $offset Number of elements to start from
     * @param int $length Number of elements to return
     *
     * @api
     */
    public function sliceWithLength(int $offset, int $length): self
    {
        $slice = $this->collection->slice($offset, $length);

        return self::of($slice);
    }
}
