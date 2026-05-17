<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Interface MinInterface.
 */
interface MinInterface
{
    /**
     * Returns the minimum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function min(): Numeric;

    /**
     * Returns the minimum value of all elements using the given key.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function minBy(string $key): Numeric;
}
