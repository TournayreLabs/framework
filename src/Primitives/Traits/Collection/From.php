<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\FromInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait From.
 *
 * @see FromInterface
 */
trait From
{
    /**
     * Creates a new map from passed elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function from()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
