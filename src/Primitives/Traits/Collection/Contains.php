<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ContainsInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Contains.
 *
 * @see ContainsInterface
 */
trait Contains
{
    /**
     * Tests if a value exists in the map.
     *
     * @api
     */
    public function contains(mixed $value): Bool_
    {
        $contains = $this->collection->contains($value);

        return Bool_::fromBool($contains);
    }

    /**
     * Tests if an item matching the condition exists in the map.
     *
     * @api
     */
    public function containsWith(mixed $key, string $operator, mixed $value): Bool_
    {
        $contains = $this->collection->contains($key, $operator, $value);

        return Bool_::fromBool($contains);
    }
}
