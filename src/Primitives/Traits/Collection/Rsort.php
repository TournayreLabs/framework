<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\RsortInterface;

/**
 * Trait Rsort.
 *
 * @see RsortInterface
 */
trait Rsort
{
    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    public function rsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->rsort($options);

        return self::of($clone);
    }
}
