<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IntersectKeysInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait IntersectKeys.
 *
 * @see IntersectKeysInterface
 */
trait IntersectKeys
{
    /**
     * Returns the elements shared by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectKeys($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectKeys = $this->collection->intersectKeys($elements, $callback);

        return self::of($intersectKeys);
    }
}
