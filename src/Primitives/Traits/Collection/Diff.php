<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DiffInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait Diff.
 *
 * @see DiffInterface
 */
trait Diff
{
    /**
     * Returns the elements missing in the given list.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function diff($elements): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diff = $this->collection->diff($elements);

        return self::of($diff);
    }

    /**
     * Returns the elements missing in the given list using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffWith($elements, \Closure $callback): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diff = $this->collection->diff($elements, $callback);

        return self::of($diff);
    }
}
