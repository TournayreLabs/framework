<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\MaxInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Mixed_;
use TournayreLabs\Primitives\Numeric;

/**
 * Trait Max.
 *
 * @see MaxInterface
 */
trait Max
{
    /**
     * Returns the maximum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function max(): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $max = $this->collection->max();
        if (Mixed_::of($max)->is()->int()->isTrue() || Mixed_::of($max)->is()->float()->isTrue()) {
            return Numeric::fromFloat((float) $max);
        }

        return Numeric::of(0);
    }

    /**
     * Returns the maximum value of all elements using the given key.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function maxBy(string $key): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $max = $this->collection->max($key);
        if (Mixed_::of($max)->is()->int()->isTrue() || Mixed_::of($max)->is()->float()->isTrue()) {
            return Numeric::fromFloat((float) $max);
        }

        return Numeric::of(0);
    }
}
