<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection;

/**
 * Interface EqualsInterface.
 */
interface EqualsInterface
{
    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     *
     * @api
     */
    public function equals($elements): Bool_;
}
