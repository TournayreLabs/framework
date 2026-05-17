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
     * @throws ThrowableInterface
     *
     * @return mixed Last key of map or NULL if empty
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
