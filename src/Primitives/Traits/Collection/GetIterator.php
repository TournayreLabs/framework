<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\GetIteratorInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait GetIterator.
 *
 * @see GetIteratorInterface
 */
trait GetIterator
{
    /**
     * Returns an iterator for the elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function getIterator()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
