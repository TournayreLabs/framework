<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Interface ImplementsInterface.
 */
interface ImplementsInterface
{
    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @param \Throwable|bool $throw Passing TRUE or an exception will throw instead of returning FALSE
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function implements(string $interface, \Throwable|bool $throw = false): Bool_;
}
