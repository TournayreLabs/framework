<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AvgInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Trait Avg.
 *
 * @see AvgInterface
 */
trait Avg
{
    /**
     * Returns the average of all values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avg(): Numeric
    {
        $avg = $this->collection->avg();

        return Numeric::fromFloat($avg);
    }

    /**
     * Returns the average of all values using the given key.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avgBy(string $key): Numeric
    {
        $avg = $this->collection->avg($key);

        return Numeric::fromFloat($avg);
    }
}
