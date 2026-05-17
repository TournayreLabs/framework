<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface ReduceInterface.
 */
interface ReduceInterface
{
    /**
     * Computes a single value from the map content.
     *
     * @param \Closure $callback Function with (result, value) parameters and returns result
     *
     * @return mixed Value computed by the callback function
     *
     * @api
     */
    public function reduce(\Closure $callback);

    /**
     * Computes a single value from the map content with an initial value.
     *
     * @param \Closure $callback Function with (result, value) parameters and returns result
     * @param mixed    $initial  Initial value when computing the result
     *
     * @return mixed Value computed by the callback function
     *
     * @api
     */
    public function reduceWith(\Closure $callback, mixed $initial);
}
