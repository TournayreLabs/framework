<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\MapInterface;

/**
 * Trait Map.
 *
 * @see MapInterface
 */
trait Map
{
    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     */
    public function map(callable $callback): self
    {
        $map = $this->collection->map($callback);

        return self::of($map);
    }
}
