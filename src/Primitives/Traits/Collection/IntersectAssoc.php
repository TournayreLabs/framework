<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IntersectAssocInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait IntersectAssoc.
 *
 * @see IntersectAssocInterface
 */
trait IntersectAssoc
{
    /**
     * Returns the elements shared and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectAssoc($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectAssoc = $this->collection->intersectAssoc($elements, $callback);

        return self::of($intersectAssoc);
    }
}
