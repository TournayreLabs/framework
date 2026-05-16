<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\GetInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Get.
 *
 * @see GetInterface
 */
trait Get
{
    /**
     * Returns an element by key.
     *
     * @param int|string $key
     * @param mixed|null $default
     *
     * @return mixed Value from map or default value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function get($key, $default = null)
    {
        try {
            return $this->collection->get($key, $default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
