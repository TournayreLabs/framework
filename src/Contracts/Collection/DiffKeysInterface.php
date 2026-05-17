<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Collection;

/**
 * Interface DiffKeysInterface.
 */
interface DiffKeysInterface
{
    /**
     * Returns the elements missing in the given list by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function diffKeys($elements): self;

    /**
     * Returns the elements missing in the given list by keys using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffKeysWith($elements, \Closure $callback): self;
}
