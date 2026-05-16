<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\KsortInterface;

/**
 * Trait Ksort.
 *
 * @see KsortInterface
 */
trait Ksort
{
    /**
     * Sort elements by keys.
     *
     * @api
     */
    public function ksort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->ksort($options);

        return self::of($clone);
    }
}
