<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\EmptyInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Empty.
 *
 * @see EmptyInterface
 */
trait Empty_
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function empty(): Bool_
    {
        $empty = $this->collection->empty();

        return Bool_::fromBool($empty);
    }
}
