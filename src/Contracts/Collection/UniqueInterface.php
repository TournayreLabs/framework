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
    public function unique(?string $key = null): self;
}
