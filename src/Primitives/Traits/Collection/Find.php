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
     * Returns the first/last matching element or throws if not found.
     *
     * @param \Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
     * @param bool     $reverse  TRUE to test elements from back to front, FALSE for front to back (default)
     *
     * @return mixed First matching value or an exception
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function find(\Closure $callback, bool $reverse = false)
    {
        try {
            $sentinel = new \stdClass();
            $result = $this->collection->find($callback, $sentinel, $reverse);
            if ($result === $sentinel) {
                RuntimeException::new('No matching element found.')->throw();
            }

            return $result;
        } catch (\Throwable $throwable) {
            if ($throwable instanceof RuntimeException) {
                throw $throwable;
            }
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * Returns the first/last matching element or returns the default value if not found.
     *
     * @param \Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
     * @param mixed    $default  Default value if the map contains no matching elements
     * @param bool     $reverse  TRUE to test elements from back to front, FALSE for front to back (default)
     *
     * @return mixed First matching value or passed default value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function findOrDefault(\Closure $callback, mixed $default, bool $reverse = false)
    {
        try {
            return $this->collection->find($callback, $default, $reverse);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
