<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\PutInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Put.
 *
 * @see PutInterface
 */
trait Put
{
    /**
     * Sets the given key and value in the map.
     *
     * @param int|string $key   Key to set the new value for
     * @param mixed      $value New element that should be set
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function put($key, mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $put = $this->collection->put($key, $value);

        return self::of($put);
    }
}
