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
     * @throws ThrowableInterface
     *
     * @api
     */
    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->set($key, $value);
    }
}
