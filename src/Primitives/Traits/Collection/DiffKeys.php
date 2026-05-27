<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DiffKeysInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Mixed_;

/**
 * Trait DiffKeys.
 *
 * @see DiffKeysInterface
 */
trait DiffKeys
{
    /**
     * Returns the elements missing in the given list by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function diffKeys($elements): self
    {
        if (Mixed_::of($elements)->is()->instanceOf(static::class)->isTrue()) {
            $elements = $elements->toArray();
        }

        $diffKeys = $this->collection->diffKeys($elements);

        return self::of($diffKeys);
    }

    /**
     * Returns the elements missing in the given list by keys using a callback.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param \Closure                              $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffKeysWith($elements, \Closure $callback): self
    {
        if (Mixed_::of($elements)->is()->instanceOf(static::class)->isTrue()) {
            $elements = $elements->toArray();
        }

        $diffKeys = $this->collection->diffKeys($elements, $callback);

        return self::of($diffKeys);
    }
}
