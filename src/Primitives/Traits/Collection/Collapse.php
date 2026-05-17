<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CollapseInterface;

/**
 * Trait Collapse.
 *
 * @see CollapseInterface
 */
trait Collapse
{
    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(): self
    {
        $collapse = $this->collection->collapse();

        return self::of($collapse);
    }

    /**
     * Collapses multi-dimensional elements overwriting elements up to the given depth.
     *
     * @api
     */
    public function collapseWithDepth(int $depth): self
    {
        $collapse = $this->collection->collapse($depth);

        return self::of($collapse);
    }
}
