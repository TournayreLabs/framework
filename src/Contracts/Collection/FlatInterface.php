<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface FlatInterface.
 */
interface FlatInterface
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(): self;

    /**
     * Flattens multi-dimensional elements without overwriting elements up to the given depth.
     *
     * @api
     */
    public function flatWithDepth(int $depth): self;
}
