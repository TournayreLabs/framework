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
     * Tests if an item exists in the map.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum;
}
