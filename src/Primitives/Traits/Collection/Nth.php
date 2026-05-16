<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\NthInterface;

/**
 * Trait Nth.
 *
 * @see NthInterface
 */
trait Nth
{
    /**
     * Returns every nth element from the map.
     *
     * @api
     */
    public function nth(int $step, int $offset = 0): self
    {
        $nth = $this->collection->nth($step, $offset);

        return self::of($nth);
    }
}
