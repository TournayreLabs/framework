<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsNumericInterface;
use TournayreLabs\Primitives\Bool_;

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
    public function isNumeric(): Bool_
    {
        $isNumeric = $this->collection->isNumeric();

        return Bool_::fromBool($isNumeric);
    }
}
