<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ShiftInterface;

/**
 * Trait Shift.
 *
 * @see ShiftInterface
 */
trait Shift
{
    /**
     * Returns and removes the first element.
     *
     * @return mixed|null Value from map or null if not found
     *
     * @api
     */
    public function shift()
    {
        return $this->collection->shift();
    }
}
