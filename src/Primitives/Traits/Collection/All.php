<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AllInterface;

/**
 * Trait All.
 *
 * @see AllInterface
 */
trait All
{
    /**
     * Returns the plain array.
     *
     * @return array<int|string, mixed>
     *
     * @api
     */
    public function all(): array
    {
        return $this->collection->all();
    }
}
