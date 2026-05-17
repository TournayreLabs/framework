<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface EmptyInterface.
 */
interface EmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function empty(): Bool_;
}
