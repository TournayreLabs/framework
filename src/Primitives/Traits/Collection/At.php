<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AtInterface;

/**
 * Trait At.
 *
 * @see AtInterface
 */
trait At
{
    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     *
     * @api
     */
    public function at(int $pos)
    {
        return $this->collection->at($pos);
    }
}
