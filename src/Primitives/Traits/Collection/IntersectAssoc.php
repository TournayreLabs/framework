<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IntersectAssocInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait IntersectAssoc.
 *
 * @see IntersectAssocInterface
 */
trait IntersectAssoc
{
    /**
     * Returns the elements shared and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectAssoc($elements): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectAssoc = $this->collection->intersectAssoc($elements);

        return self::of($intersectAssoc);
    }

    /**
     * Returns the elements shared and checks keys using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function intersectAssocWith($elements, \Closure $callback): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectAssoc = $this->collection->intersectAssoc($elements, $callback);

        return self::of($intersectAssoc);
    }
}
