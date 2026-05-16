<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ToArrayInterface;

/**
 * Trait ToArray.
 *
 * @see ToArrayInterface
 */
trait ToArray
{
    /**
     * Returns the plain array.
     *
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
