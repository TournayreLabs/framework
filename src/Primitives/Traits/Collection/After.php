<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AfterInterface;

/**
 * Trait After.
 *
 * @see AfterInterface
 */
trait After
{
    /**
     * Returns the elements after the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function after($value): self
    {
        $after = $this->collection->after($value);

        return self::of($after);
    }
}
