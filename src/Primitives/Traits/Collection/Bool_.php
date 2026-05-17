<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\BoolInterface;
use TournayreLabs\Primitives\Bool_ as PrimitiveBool;

/**
 * Trait Bool.
 *
 * @see BoolInterface
 */
trait Bool_
{
    /**
     * Returns an element by key and casts it to boolean.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to bool)
     *
     * @api
     */
    public function bool($key, mixed $default = false): PrimitiveBool
    {
        $bool = $this->collection->bool($key, $default);

        return PrimitiveBool::fromBool($bool);
    }
}
