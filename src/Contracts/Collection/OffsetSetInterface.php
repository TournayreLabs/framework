<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface OffsetSetInterface.
 */
interface OffsetSetInterface
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
    public function offsetSet($key, $value, ?\Closure $callback = null): void;
}
