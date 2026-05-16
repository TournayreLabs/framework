<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface BoolInterface.
 */
interface BoolInterface
{
    /**
     * Returns an element by key and casts it to boolean.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to bool)
     *
     * @api
     */
    public function bool($key, mixed $default = false): BoolEnum;
}
