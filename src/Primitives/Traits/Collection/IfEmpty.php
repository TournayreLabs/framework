<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\IfEmptyInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait IfEmpty.
 *
 * @see IfEmptyInterface
 */
trait IfEmpty
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifEmpty()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
