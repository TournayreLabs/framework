<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\EmptyInterface;
use TournayreLabs\Primitives\BoolEnum;

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
    public function empty(): BoolEnum
    {
        $empty = $this->collection->empty();

        return BoolEnum::fromBool($empty);
    }
}
