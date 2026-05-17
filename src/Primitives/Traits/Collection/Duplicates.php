<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DuplicatesInterface;

/**
 * Trait Duplicates.
 *
 * @see DuplicatesInterface
 */
trait Duplicates
{
    /**
     * Returns the duplicate values from the map.
     *
     * @api
     */
    public function duplicates(): self
    {
        $duplicates = $this->collection->duplicates();

        return self::of($duplicates);
    }

    /**
     * Returns the duplicate values from the map using the given key for nested arrays.
     *
     * @api
     */
    public function duplicatesBy(string $key): self
    {
        $duplicates = $this->collection->duplicates($key);

        return self::of($duplicates);
    }
}
