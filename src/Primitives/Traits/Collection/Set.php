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
     * Overwrites or adds an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set($key, $value, ?\Closure $callback = null): void
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($callback instanceof \Closure && !$callback($key, $value)) {
            return;
        }

        $this->collection->set($key, $value);
    }
}
