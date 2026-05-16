<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;

/**
 * Trait Is.
 *
 * @see IsInterface
 */
trait Is
{
    /**
     * Tests if the map consists of the same keys and values.
     *
     * @param iterable<int|string,mixed>|Collection $list   List of key/value pairs to compare with
     * @param bool                                  $strict TRUE for comparing order of elements too, FALSE for key/values only
     *
     * @api
     */
    public function is($list, bool $strict = false): BoolEnum
    {
        if ($list instanceof self) {
            $list = $list->toArray();
        }

        $is = $this->collection->is($list, $strict);

        return BoolEnum::fromBool($is);
    }
}
