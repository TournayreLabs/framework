<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface IsScalarInterface.
 */
interface IsScalarInterface
{
    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    public function isScalar(): BoolEnum;
}
