<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface SuffixInterface.
 */
interface SuffixInterface
{
    /**
     * Adds a suffix to each map entry.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     *
     * @api
     */
    public function suffix($suffix): self;

    /**
     * Adds a suffix to each map entry up to the given depth.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     * @param int             $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function suffixWithDepth($suffix, int $depth): self;
}
