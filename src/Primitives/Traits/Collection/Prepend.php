<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\PrependInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Prepend.
 *
 * @see PrependInterface
 */
trait Prepend
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
    public function prepend(mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $prepend = $this->collection->prepend($value);

        return self::of($prepend);
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
    public function prependWithKey(mixed $value, mixed $key): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());
        if (!\is_int($key) && !\is_string($key) && null !== $key) {
            return $this;
        }

        $prepend = $this->collection->prepend($value, $key);

        return self::of($prepend);
    }
}
