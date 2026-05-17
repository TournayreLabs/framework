<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IntersectKeysInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait IntersectKeys.
 *
 * @see IntersectKeysInterface
 */
trait IntersectKeys
{
    /**
     * Returns the elements shared by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectKeys($elements): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectKeys = $this->collection->intersectKeys($elements);

        return self::of($intersectKeys);
    }

    /**
     * Returns the elements shared by keys using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function intersectKeysWith($elements, \Closure $callback): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectKeys = $this->collection->intersectKeys($elements, $callback);

        return self::of($intersectKeys);
    }
}
