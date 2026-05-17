<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CompareInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Compare.
 *
 * @see CompareInterface
 */
trait Compare
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    public function compare(string $value, bool $case = true): Bool_
    {
        $compare = $this->collection->strCompare($value, $case);

        return Bool_::fromBool($compare);
    }
}
