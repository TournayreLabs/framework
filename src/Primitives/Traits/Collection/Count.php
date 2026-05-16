<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CountInterface;
use TournayreLabs\Primitives\Int_;

/**
 * Trait Count.
 *
 * @see CountInterface
 */
trait Count
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Int_
    {
        $count = $this->collection->count();

        return Int_::of($count);
    }
}
