<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\SetInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Mixed_;

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
        if (Mixed_::of($key)->is()->int()->isTrue() || Mixed_::of($key)->is()->string()->isTrue()) {
            $this->collection->set($key, $value);
        }
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function setWithCallback(mixed $key, mixed $value, \Closure $callback): void
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());
        if (
            (Mixed_::of($key)->is()->int()->isTrue() || Mixed_::of($key)->is()->string()->isTrue())
            && $callback($key, $value)
        ) {
            $this->collection->set($key, $value);
        }
    }
}
