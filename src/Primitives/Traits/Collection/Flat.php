<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\FlatInterface;

/**
 * Trait Flat.
 *
 * @see FlatInterface
 */
trait Flat
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(): self
    {
        $flat = $this->collection->flat();

        return self::of($flat);
    }

    /**
     * Flattens multi-dimensional elements without overwriting elements up to the given depth.
     *
     * @api
     */
    public function flatWithDepth(int $depth): self
    {
        $flat = $this->collection->flat($depth);

        return self::of($flat);
    }
}
