<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\EqualsInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection;

/**
 * Trait Equals.
 *
 * @see EqualsInterface
 */
trait Equals
{
    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     *
     * @api
     */
    public function equals($elements): Bool_
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $equals = $this->collection->equals($elements);

        return Bool_::fromBool($equals);
    }
}
