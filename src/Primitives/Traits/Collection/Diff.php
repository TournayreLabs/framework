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
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diff($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diff = $this->collection->diff($elements, $callback);

        return self::of($diff);
    }
}
