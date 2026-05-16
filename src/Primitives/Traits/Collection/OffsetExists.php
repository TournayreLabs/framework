<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OffsetExistsInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait OffsetExists.
 *
 * @see OffsetExistsInterface
 */
trait OffsetExists
{
    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     */
    public function offsetExists($key): BoolEnum
    {
        $exists = $this->collection->offsetExists($key);

        return BoolEnum::fromBool($exists);
    }
}
