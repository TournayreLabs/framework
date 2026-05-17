<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface PullInterface.
 */
interface PullInterface
{
    /**
     * Returns and removes an element by key or throws if key is absent.
     *
     * @param int|string $key Key to retrieve the value for
     *
     * @throws ThrowableInterface
     *
     * @return mixed Value from map
     *
     * @api
     */
    public function pull($key);

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
    public function pullOrDefault($key, mixed $default);
}
