<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\PushInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Push.
 *
 * @see PushInterface
 */
trait Push
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function push(mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $this->collection->push($value);

        return $this;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pushWithCallback(mixed $value, \Closure $callback): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if (!$callback($value)) {
            return $this;
        }

        $this->collection->push($value);

        return $this;
    }
}
