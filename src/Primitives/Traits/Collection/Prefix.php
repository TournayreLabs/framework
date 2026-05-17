<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PrefixInterface;

/**
 * Trait Prefix.
 *
 * @see PrefixInterface
 */
trait Prefix
{
    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     *
     * @api
     */
    public function prefix($prefix): self
    {
        $prefix = $this->collection->prefix($prefix);

        return self::of($prefix);
    }

    /**
     * Adds a prefix to each map entry up to the given depth.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int             $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function prefixWithDepth($prefix, int $depth): self
    {
        $prefix = $this->collection->prefix($prefix, $depth);

        return self::of($prefix);
    }
}
