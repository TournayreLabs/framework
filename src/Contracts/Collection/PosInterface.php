<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface PosInterface.
 */
interface PosInterface
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
    public function pos($value): int;

    /**
     * Returns the numerical index of the value, or a default if not found.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    public function posOrDefault($value, int $default): int;
}
