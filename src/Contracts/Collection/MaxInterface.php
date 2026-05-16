<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Interface MaxInterface.
 */
interface MaxInterface
{
    /**
     * Returns the maximum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function max(?string $key = null): Numeric;
}
