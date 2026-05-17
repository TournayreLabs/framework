<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\MinInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Trait Min.
 *
 * @see MinInterface
 */
trait Min
{
    /**
     * Returns the minimum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function min(): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $min = $this->collection->min();

        return Numeric::fromFloat($min ?? 0);
    }

    /**
     * Returns the minimum value of all elements using the given key.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function minBy(string $key): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $min = $this->collection->min($key);

        return Numeric::fromFloat($min ?? 0);
    }
}
