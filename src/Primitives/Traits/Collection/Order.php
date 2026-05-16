<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OrderInterface;

/**
 * Trait Order.
 *
 * @see OrderInterface
 */
trait Order
{
    /**
     * Orders elements by the passed keys.
     *
     * @param iterable<mixed> $keys Keys of the elements in the required order
     *
     * @api
     */
    public function order(iterable $keys): self
    {
        $order = $this->collection->order($keys);

        return self::of($order);
    }
}
