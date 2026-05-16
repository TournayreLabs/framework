<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Collection;

/**
 * Interface DiffInterface.
 */
interface DiffInterface
{
    /**
     * Returns the elements missing in the given list.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diff($elements, ?callable $callback = null): self;
}
