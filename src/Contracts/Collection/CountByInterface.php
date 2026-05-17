<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface CountByInterface.
 */
interface CountByInterface
{
    /**
     * Counts how often the same values are in the map.
     *
     * @api
     */
    public function countBy(): self;

    /**
     * Counts how often the same values are in the map using a callback.
     *
     * @param \Closure $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    public function countByWith(\Closure $callback): self;
}
