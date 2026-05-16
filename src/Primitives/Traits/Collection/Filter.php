<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\FilterInterface;

/**
 * Trait Filter.
 *
 * @see FilterInterface
 */
trait Filter
{
    /**
     * Applies a filter to all elements.
     *
     * @api
     */
    public function filter(?callable $callback = null): self
    {
        $filtered = $this->collection->filter($callback);

        return self::of($filtered);
    }
}
