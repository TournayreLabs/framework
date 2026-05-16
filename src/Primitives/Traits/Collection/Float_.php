<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Collection\FloatInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Numeric;

/**
 * Trait Float.
 *
 * @see FloatInterface
 */
trait Float_
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
    public function float($key, mixed $default = 0.0): Numeric
    {
        $float = $this->collection->float($key, $default);
        try {
            return Numeric::fromFloat($float);
        } catch (\Exception|ThrowableInterface $e) {
            throw InvalidArgumentException::fromThrowable($e);
        }
    }
}
