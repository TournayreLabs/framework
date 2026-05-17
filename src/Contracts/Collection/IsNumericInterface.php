<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

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
    public function isNumeric(): Bool_;
}
