<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\EachInterface;

/**
 * Trait Each.
 *
 * @see EachInterface
 */
trait Each
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    public function each(\Closure $callback): self
    {
        $collection = $this->collection->each($callback);

        return self::of($collection);
    }
}
