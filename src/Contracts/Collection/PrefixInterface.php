<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface PrefixInterface.
 */
interface PrefixInterface
{
    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     *
     * @api
     */
    public function prefix($prefix): self;

    /**
     * Adds a prefix to each map entry up to the given depth.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int             $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function prefixWithDepth($prefix, int $depth): self;
}
