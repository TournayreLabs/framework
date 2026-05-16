<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ContainsInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait Contains.
 *
 * @see ContainsInterface
 */
trait Contains
{
    /**
     * Tests if an item exists in the map.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        $contains = $this->collection->contains($key, $operator, $value);

        return BoolEnum::fromBool($contains);
    }
}
