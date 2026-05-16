<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AsortInterface;

/**
 * Trait Asort.
 *
 * @see AsortInterface
 */
trait Asort
{
    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    public function asort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->asort($options);

        return self::of($clone);
    }
}
