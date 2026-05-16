<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

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
    public function isObject(): BoolEnum;
}
