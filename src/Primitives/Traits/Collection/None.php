<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\NoneInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait None.
 *
 * @see NoneInterface
 */
trait None
{
    /**
     * Tests if none of the elements are part of the map.
     *
     * @param mixed|null $element Element or elements to search for in the map
     *
     * @api
     */
    public function none($element, bool $strict = false): BoolEnum
    {
        $none = $this->collection->none($element, $strict);

        return BoolEnum::fromBool($none);
    }
}
