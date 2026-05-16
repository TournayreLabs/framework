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
     * Returns the minium value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function min(?string $key = null): Numeric;
}
