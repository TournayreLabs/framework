<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\SomeInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Some.
 *
 * @see SomeInterface
 */
trait Some
{
    /**
     * Tests if at least one element is included.
     *
     * @param \Closure|iterable|mixed $values Anonymous function with (item, key) parameter, element or list of elements to test against
     *
     * @api
     */
    public function some($values, bool $strict = false): Bool_
    {
        $some = $this->collection->some($values, $strict);

        return Bool_::fromBool($some);
    }
}
