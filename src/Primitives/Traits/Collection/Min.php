<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\MinInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Mixed_;
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
        if (Mixed_::of($min)->is()->int()->isTrue() || Mixed_::of($min)->is()->float()->isTrue()) {
            return Numeric::fromFloat((float) $min);
        }

        return Numeric::of(0);
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
        if (Mixed_::of($min)->is()->int()->isTrue() || Mixed_::of($min)->is()->float()->isTrue()) {
            return Numeric::fromFloat((float) $min);
        }

        return Numeric::of(0);
    }
}
