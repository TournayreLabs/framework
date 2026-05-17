<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\LastInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Last.
 *
 * @see LastInterface
 */
trait Last
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function last(): mixed
    {
        try {
            return $this->collection->last();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
