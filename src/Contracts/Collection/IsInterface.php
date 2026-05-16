<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;

/**
 * Interface IsInterface.
 */
interface IsInterface
{
    /**
     * Tests if the map consists of the same keys and values.
     *
     * @param iterable<int|string,mixed>|Collection $list   List of key/value pairs to compare with
     * @param bool                                  $strict TRUE for comparing order of elements too, FALSE for key/values only
     *
     * @api
     */
    public function is($list, bool $strict = false): BoolEnum;
}
