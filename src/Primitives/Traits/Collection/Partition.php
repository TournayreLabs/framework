<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PartitionInterface;

/**
 * Trait Partition.
 *
 * @see PartitionInterface
 */
trait Partition
{
    /**
     * Breaks the list into the given number of groups.
     *
     * @param \Closure|int $number Function with (value, index) as arguments returning the bucket key or number of groups
     *
     * @api
     */
    public function partition(\Closure|int $number): self
    {
        $partition = $this->collection->partition($number);

        return self::of($partition);
    }
}
