<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\FindInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Find.
 *
 * @see FindInterface
 */
trait Find
{
    /**
     * Returns the first/last matching element.
     *
     * @param \Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
     * @param mixed    $default  Default value or exception if the map contains no elements
     * @param bool     $reverse  TRUE to test elements from back to front, FALSE for front to back (default)
     *
     * @return mixed First matching value, passed default value or an exception
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function find(\Closure $callback, mixed $default = null, bool $reverse = false)
    {
        try {
            return $this->collection->find($callback, $default, $reverse);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
