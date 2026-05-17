<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\FirstKeyInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait FirstKey.
 *
 * @see FirstKeyInterface
 */
trait FirstKey
{
    /**
     * Returns the first key.
     *
     * @throws ThrowableInterface
     *
     * @return mixed First key of map or NULL if empty
     *
     * @api
     */
    public function firstKey()
    {
        try {
            return $this->collection->firstKey();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
