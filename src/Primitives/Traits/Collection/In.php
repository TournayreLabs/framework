<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\InInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait In.
 *
 * @see InInterface
 */
trait In
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     *
     * @api
     */
    public function in($element, bool $strict = false): Bool_
    {
        $in = $this->collection->in($element, $strict);

        return Bool_::fromBool($in);
    }
}
