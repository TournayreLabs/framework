<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface IsObjectInterface.
 */
interface IsObjectInterface
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): Bool_;
}
