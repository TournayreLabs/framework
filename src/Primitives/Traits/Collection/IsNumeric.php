<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsNumericInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait IsNumeric.
 *
 * @see IsNumericInterface
 */
trait IsNumeric
{
    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    public function isNumeric(): BoolEnum
    {
        $isNumeric = $this->collection->isNumeric();

        return BoolEnum::fromBool($isNumeric);
    }
}
