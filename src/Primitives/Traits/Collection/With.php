<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\WithInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait With.
 *
 * @see WithInterface
 */
trait With
{
    /**
     * Returns a copy and sets an element.
     *
     * @param int|string $key   Array key to set or replace
     * @param mixed      $value New value for the given key
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function with($key, mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $with = $this->collection->with($key, $value);

        return self::of($with);
    }
}
