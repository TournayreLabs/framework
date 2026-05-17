<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface GetIteratorInterface.
 *
 * @extends \IteratorAggregate<int|string, mixed>
 */
interface GetIteratorInterface extends \IteratorAggregate
{
    /**
     * Returns an iterator for the elements.
     *
     * @return \ArrayIterator<int|string, mixed>
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function getIterator(): \ArrayIterator;
}
