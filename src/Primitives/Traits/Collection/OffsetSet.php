<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\OffsetSetInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait OffsetSet.
 *
 * @see OffsetSetInterface
 */
trait OffsetSet
{
    /**
     * Overwrites an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function offsetSet($key, $value, ?\Closure $callback = null): void
    {
        $this->set($key, $value, $callback);
    }
}
