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
     * Returns an element by key or throws if key is absent.
     *
     * @param int|string $key
     *
     * @throws ThrowableInterface
     *
     * @return mixed Value from map
     *
     * @api
     */
    public function get($key)
    {
        if (!$this->collection->has($key)) {
            RuntimeException::new("Key '{$key}' not found.")->throw();
        }

        try {
            return $this->collection->get($key);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * Returns an element by key or returns the default value if key is absent.
     *
     * @param int|string $key
     *
     * @return mixed Value from map or default value
     *
     * @api
     */
    public function getOrDefault($key, mixed $default)
    {
        try {
            return $this->collection->get($key, $default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
