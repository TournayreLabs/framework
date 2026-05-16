<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PipeInterface;

/**
 * Trait Pipe.
 *
 * @see PipeInterface
 */
trait Pipe
{
    /**
     * Applies a callback to the whole map.
     *
     * @param \Closure $callback Function with map as parameter which returns arbitrary result
     *
     * @return mixed Result returned by the callback
     *
     * @api
     */
    public function pipe(\Closure $callback)
    {
        return $this->collection->pipe($callback);
    }
}
