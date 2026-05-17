<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\UnexpectedValueException;
use TournayreLabs\Contracts\Collection\ImplementsInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Implements.
 *
 * @see ImplementsInterface
 */
trait Implements_
{
    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @param \Throwable|bool|string $throw Passing TRUE or an exception name will throw the exception instead of returning FALSE
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function implements(string $interface, $throw = false): Bool_
    {
        try {
            $implements = $this->collection->implements($interface, $throw);

            return Bool_::fromBool($implements);
        } catch (\Throwable $throwable) {
            throw UnexpectedValueException::fromThrowable($throwable);
        }
    }
}
