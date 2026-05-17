<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface GetIteratorInterface.
 */
interface GetIteratorInterface extends \IteratorAggregate
{
    /**
     * Returns an iterator for the elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function getIterator(): \ArrayIterator;
}
