<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OffsetUnsetInterface;

/**
 * Trait OffsetUnset.
 *
 * @see OffsetUnsetInterface
 */
trait OffsetUnset
{
    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    public function offsetUnset($key): void
    {
        $this->collection->offsetUnset($key);
    }
}
