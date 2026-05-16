<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\CallInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Call.
 *
 * @see CallInterface
 */
trait Call
{
    /**
     * Calls the given method on all items.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function call()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
