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
    public function flat(?int $depth = null): self
    {
        $flat = $this->collection->flat($depth);

        return self::of($flat);
    }
}
