<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface FilterInterface.
 */
interface FilterInterface
{
    /**
     * Applies a filter to all elements.
     *
     * @api
     */
    public function filter(): self;

    /**
     * Applies a filter callback to all elements.
     *
     * @api
     */
    public function filterWith(\Closure $callback): self;
}
