<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Interface AvgInterface.
 */
interface AvgInterface
{
    /**
     * Returns the average of all values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avg(): Numeric;

    /**
     * Returns the average of all values using the given key.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avgBy(string $key): Numeric;
}
