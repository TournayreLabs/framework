<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\GroupByInterface;

/**
 * Trait GroupBy.
 *
 * @see GroupByInterface
 */
trait GroupBy
{
    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     *
     * @api
     */
    public function groupBy($key): self
    {
        $groupBy = $this->collection->groupBy($key);

        return self::of($groupBy);
    }
}
