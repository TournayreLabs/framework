<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DiffAssocInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait DiffAssoc.
 *
 * @see DiffAssocInterface
 */
trait DiffAssoc
{
    /**
     * Returns the elements missing in the given list and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function diffAssoc($elements): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diffAssoc = $this->collection->diffAssoc($elements);

        return self::of($diffAssoc);
    }

    /**
     * Returns the elements missing in the given list and checks keys using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffAssocWith($elements, \Closure $callback): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diffAssoc = $this->collection->diffAssoc($elements, $callback);

        return self::of($diffAssoc);
    }
}
