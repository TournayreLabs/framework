<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\SumInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Trait Sum.
 *
 * @see SumInterface
 */
trait Sum
{
    /**
     * Returns the sum of all values in the map.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sum(?string $key = null): Numeric
    {
        $sum = $this->collection->sum($key);

        return Numeric::fromFloat($sum);
    }
}
