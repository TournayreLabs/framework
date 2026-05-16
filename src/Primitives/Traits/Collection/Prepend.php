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
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function prepend(mixed $value, $key = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $prepend = $this->collection->prepend($value, $key);

        return self::of($prepend);
    }
}
