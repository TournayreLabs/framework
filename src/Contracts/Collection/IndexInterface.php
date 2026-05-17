<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface IndexInterface.
 */
interface IndexInterface
{
    /**
     * Returns the numerical index of the given key.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @throws ThrowableInterface If the key is not found
     *
     * @api
     */
    public function index($value): int;

    /**
     * Returns the numerical index of the given key, or a default if not found.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @api
     */
    public function indexOrDefault($value, int $default): int;
}
