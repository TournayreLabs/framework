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
    public function filter(): self
    {
        $filtered = $this->collection->filter();

        return self::of($filtered);
    }

    /**
     * Applies a filter callback to all elements.
     *
     * @api
     */
    public function filterWith(\Closure $callback): self
    {
        $filtered = $this->collection->filter($callback);

        return self::of($filtered);
    }
}
