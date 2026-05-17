<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface ContainsInterface.
 */
interface ContainsInterface
{
    /**
     * Tests if a value exists in the map.
     *
     * @api
     */
    public function contains(mixed $value): BoolEnum;

    /**
     * Tests if an item matching the condition exists in the map.
     *
     * @api
     */
    public function containsWith(mixed $key, string $operator, mixed $value): BoolEnum;
}
