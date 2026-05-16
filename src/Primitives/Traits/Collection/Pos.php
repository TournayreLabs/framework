<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PosInterface;

/**
 * Trait Pos.
 *
 * @see PosInterface
 */
trait Pos
{
    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    public function pos($value): ?int
    {
        return $this->collection->pos($value);
    }
}
