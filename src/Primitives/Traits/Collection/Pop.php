<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PopInterface;

/**
 * Trait Pop.
 *
 * @see PopInterface
 */
trait Pop
{
    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     *
     * @api
     */
    public function pop()
    {
        return $this->collection->pop();
    }
}
