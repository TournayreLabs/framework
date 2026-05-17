<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\PullInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Pull.
 *
 * @see PullInterface
 */
trait Pull
{
    /**
     * Returns and removes an element by key or throws if key is absent.
     *
     * @param int|string $key Key to retrieve the value for
     *
     * @return mixed Value from map
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pull($key)
    {
        if (!$this->collection->has($key)) {
            RuntimeException::new("Key '{$key}' not found.")->throw();
        }

        return $this->collection->pull($key);
    }

    /**
     * Returns and removes an element by key or returns the default value if key is absent.
     *
     * @param int|string $key     Key to retrieve the value for
     * @param mixed      $default Default value if key isn't available
     *
     * @return mixed Value from map or default value
     *
     * @api
     */
    public function pullOrDefault($key, mixed $default)
    {
        return $this->collection->pull($key, $default);
    }
}
