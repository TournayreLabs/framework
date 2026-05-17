<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface IsEmptyInterface.
 */
interface IsEmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function isEmpty(): Bool_;
}
