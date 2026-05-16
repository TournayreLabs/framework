<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\KeysInterface;

/**
 * Trait Keys.
 *
 * @see KeysInterface
 */
trait Keys
{
    /**
     * Returns all keys.
     *
     * @api
     *
     * @return array-key[]
     */
    public function keys(): array
    {
        return $this->collection->keys()->toArray();
    }
}
