<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface DuplicatesInterface.
 */
interface DuplicatesInterface
{
    /**
     * Returns the duplicate values from the map.
     *
     * @api
     */
    public function duplicates(): self;

    /**
     * Returns the duplicate values from the map using the given key for nested arrays.
     *
     * @api
     */
    public function duplicatesBy(string $key): self;
}
