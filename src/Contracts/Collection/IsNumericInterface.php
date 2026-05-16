<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface IsNumericInterface.
 */
interface IsNumericInterface
{
    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    public function isNumeric(): BoolEnum;
}
