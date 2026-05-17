<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface CollapseInterface.
 */
interface CollapseInterface
{
    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(): self;

    /**
     * Collapses multi-dimensional elements overwriting elements up to the given depth.
     *
     * @api
     */
    public function collapseWithDepth(int $depth): self;
}
