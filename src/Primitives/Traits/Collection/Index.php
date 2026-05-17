<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\IndexInterface;

/**
 * Trait Index.
 *
 * @see IndexInterface
 */
trait Index
{
    /**
     * Returns the numerical index of the given key.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @throws \TournayreLabs\Contracts\Exception\ThrowableInterface If the key is not found
     *
     * @api
     */
    public function index($value): int
    {
        $result = $this->collection->index($value);

        if (null === $result) {
            throw RuntimeException::new('Key not found in collection');
        }

        return $result;
    }

    /**
     * Returns the numerical index of the given key, or a default if not found.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @api
     */
    public function indexOrDefault($value, int $default): int
    {
        return $this->collection->index($value) ?? $default;
    }
}
