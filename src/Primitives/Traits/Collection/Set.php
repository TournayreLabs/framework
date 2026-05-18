<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\SetInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Set.
 *
 * @see SetInterface
 */
trait Set
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set(mixed $key, mixed $value): void
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());
        if (!\is_int($key) && !\is_string($key)) {
            return;
        }

        $this->collection->set($key, $value);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function setWithCallback(mixed $key, mixed $value, \Closure $callback): void
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());
        if (!\is_int($key) && !\is_string($key)) {
            return;
        }

        if (!$callback($key, $value)) {
            return;
        }

        $this->collection->set($key, $value);
    }
}
