<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsEmptyInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait IsEmpty.
 *
 * @see IsEmptyInterface
 */
trait IsEmpty
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function isEmpty(): Bool_
    {
        $isEmpty = $this->collection->isEmpty();

        return Bool_::fromBool($isEmpty);
    }
}
