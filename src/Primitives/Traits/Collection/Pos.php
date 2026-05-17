<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\PosInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Pos.
 *
 * @see PosInterface
 */
trait Pos
{
    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @throws ThrowableInterface If the value is not found
     *
     * @api
     */
    public function pos($value): int
    {
        $result = $this->collection->pos($value);

        if (null === $result) {
            throw RuntimeException::new('Value not found in collection');
        }

        return $result;
    }

    /**
     * Returns the numerical index of the value, or a default if not found.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    public function posOrDefault($value, int $default): int
    {
        return $this->collection->pos($value) ?? $default;
    }
}
