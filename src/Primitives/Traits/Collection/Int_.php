<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IntInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Int_ as PrimitiveInt_;

/**
 * Trait Int.
 *
 * @see IntInterface
 */
trait Int_
{
    /**
     * Returns an element by key and casts it to integer.
     *
     * @param int|string $key     Key or path to the requested item
     * @param mixed      $default Default value if key isn't found (will be casted to integer)
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function int($key, mixed $default = 0): PrimitiveInt_
    {
        $int = $this->collection->int($key, $default);

        return PrimitiveInt_::of($int);
    }
}
