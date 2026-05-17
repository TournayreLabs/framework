<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface GetInterface.
 */
interface GetInterface
{
    /**
     * Returns an element by key or throws if key is absent.
     *
     * @param int|string $key
     *
     * @return mixed Value from map
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function get($key);

    /**
     * Returns an element by key or returns the default value if key is absent.
     *
     * @param int|string $key
     * @param mixed      $default
     *
     * @return mixed Value from map or default value
     *
     * @api
     */
    public function getOrDefault($key, mixed $default);
}
