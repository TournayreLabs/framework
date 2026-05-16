<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\LastKeyInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait LastKey.
 *
 * @see LastKeyInterface
 */
trait LastKey
{
    /**
     * Returns the last key.
     *
     * @return mixed Last key of map or NULL if empty
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lastKey()
    {
        try {
            return $this->collection->lastKey();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
