<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CountByInterface;

/**
 * Trait CountBy.
 *
 * @see CountByInterface
 */
trait CountBy
{
    /**
     * Counts how often the same values are in the map.
     *
     * @api
     */
    public function countBy(): self
    {
        $countBy = $this->collection->countBy();

        return self::of($countBy);
    }

    /**
     * Counts how often the same values are in the map using a callback.
     *
     * @param \Closure $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    public function countByWith(\Closure $callback): self
    {
        $countBy = $this->collection->countBy($callback);

        return self::of($countBy);
    }
}
