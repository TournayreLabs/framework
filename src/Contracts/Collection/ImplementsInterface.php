<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface ImplementsInterface.
 */
interface ImplementsInterface
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
    public function implements(string $interface, $throw = false): BoolEnum;
}
