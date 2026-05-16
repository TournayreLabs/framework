<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsEmptyInterface;
use TournayreLabs\Primitives\BoolEnum;

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
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->collection->isEmpty();

        return BoolEnum::fromBool($isEmpty);
    }
}
