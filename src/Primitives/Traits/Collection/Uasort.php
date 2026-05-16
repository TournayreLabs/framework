<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\UasortInterface;

/**
 * Trait Uasort.
 *
 * @see UasortInterface
 */
trait Uasort
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort(callable $callback): self
    {
        $uasort = $this->collection->uasort($callback);

        return self::of($uasort);
    }
}
