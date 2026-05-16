<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Int_;

/**
 * Interface CountInterface.
 */
interface CountInterface
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Int_;
}
