<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface UniqueInterface.
 */
interface UniqueInterface
{
    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     */
    public function unique(): self;

    /**
     * Returns all unique elements preserving keys using the given key.
     *
     * @api
     */
    public function uniqueBy(string $key): self;
}
