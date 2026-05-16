<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\DdInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Dd.
 *
 * @see DdInterface
 */
trait Dd
{
    /**
     * Prints the map content and terminates the script.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
