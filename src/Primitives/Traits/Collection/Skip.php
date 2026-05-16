<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\SkipInterface;

/**
 * Trait Skip.
 *
 * @see SkipInterface
 */
trait Skip
{
    /**
     * Skips the given number of items and return the rest.
     *
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    public function skip($offset): self
    {
        $skip = $this->collection->skip($offset);

        return self::of($skip);
    }
}
