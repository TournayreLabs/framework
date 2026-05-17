<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\PadInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Pad.
 *
 * @see PadInterface
 */
trait Pad
{
    /**
     * Fill up to the specified length with null values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pad(int $size): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $pad = $this->collection->pad($size);

        return self::of($pad);
    }

    /**
     * Fill up to the specified length with the given value.
     *
     * @param mixed $value Value to fill up with if the map length is smaller than the given size
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function padWith(int $size, mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $pad = $this->collection->pad($size, $value);

        return self::of($pad);
    }
}
