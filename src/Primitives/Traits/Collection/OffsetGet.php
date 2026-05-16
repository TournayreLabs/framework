<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OffsetGetInterface;

/**
 * Trait OffsetGet.
 *
 * @see OffsetGetInterface
 */
trait OffsetGet
{
    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }
}
