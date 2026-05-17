<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\GetIteratorInterface;

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
     * @api
     */
    public function getIterator(): \ArrayIterator
    {
        return $this->collection->getIterator();
    }
}
