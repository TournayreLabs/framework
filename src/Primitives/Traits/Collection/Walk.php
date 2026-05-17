<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\WalkInterface;

/**
 * Trait Walk.
 *
 * @see WalkInterface
 */
trait Walk
{
    /**
     * Applies the given callback to all elements.
     *
     * @param \Closure $callback  Function with (item, key) parameters
     * @param bool     $recursive TRUE to traverse sub-arrays recursively (default), FALSE to iterate Map elements only
     *
     * @api
     */
    public function walk(\Closure $callback, bool $recursive = true): self
    {
        $walk = $this->collection->walk($callback, null, $recursive);

        return self::of($walk);
    }

    /**
     * Applies the given callback to all elements with additional data.
     *
     * @param \Closure $callback  Function with (item, key, data) parameters
     * @param mixed    $data      Arbitrary data that will be passed to the callback as third parameter
     * @param bool     $recursive TRUE to traverse sub-arrays recursively (default), FALSE to iterate Map elements only
     *
     * @api
     */
    public function walkWith(\Closure $callback, mixed $data, bool $recursive = true): self
    {
        $walk = $this->collection->walk($callback, $data, $recursive);

        return self::of($walk);
    }
}
