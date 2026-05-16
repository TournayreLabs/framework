<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Interface SumInterface.
 */
interface SumInterface
{
    /**
     * Returns the sum of all values in the map.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sum(?string $key = null): Numeric;
}
