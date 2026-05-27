<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\UnshiftInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Mixed_;

/**
 * Trait Unshift.
 *
 * @see UnshiftInterface
 */
trait Unshift
{
    /**
     * Adds an element at the beginning.
     *
     * @param mixed $value Item to add at the beginning
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshift(mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $unshift = $this->collection->unshift($value);

        return self::of($unshift);
    }

    /**
     * Adds an element at the beginning with a key.
     *
     * @param mixed $value Item to add at the beginning
     * @param mixed $key   Key for the item
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshiftWithKey(mixed $value, mixed $key): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());
        if (Mixed_::of($key)->is()->int()->isTrue() || Mixed_::of($key)->is()->string()->isTrue() || null === $key) {
            $unshift = $this->collection->unshift($value, $key);

            return self::of($unshift);
        }

        return $this;
    }
}
