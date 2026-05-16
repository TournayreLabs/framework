<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsObjectInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait IsObject.
 *
 * @see IsObjectInterface
 */
trait IsObject
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): BoolEnum
    {
        $isObject = $this->collection->isObject();

        return BoolEnum::fromBool($isObject);
    }
}
