<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface FindInterface.
 */
interface FindInterface
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
    public function find(\Closure $callback, bool $reverse = false);

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
    public function findOrDefault(\Closure $callback, mixed $default, bool $reverse = false);
}
