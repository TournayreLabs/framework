<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\UniqueInterface;

/**
 * Trait Unique.
 *
 * @see UniqueInterface
 */
trait Unique
{
    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     */
    public function unique(?string $key = null): self
    {
        $unique = $this->collection->unique($key);

        return self::of($unique);
    }
}
