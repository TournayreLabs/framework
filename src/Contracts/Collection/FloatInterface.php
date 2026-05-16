<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Interface FloatInterface.
 */
interface FloatInterface
{
    /**
     * Returns an element by key and casts it to float.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to float)
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function float($key, mixed $default = 0.0): Numeric;
}
