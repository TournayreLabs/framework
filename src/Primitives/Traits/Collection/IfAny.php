<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IfAnyInterface;

/**
 * Trait IfAny.
 *
 * @see IfAnyInterface
 */
trait IfAny
{
    /**
     * Executes a callback if the map contains elements.
     *
     * @api
     */
    public function ifAny(\Closure $then): self
    {
        $ifAny = $this->collection->ifAny($then);

        return self::of($ifAny);
    }

    /**
     * Executes a then or else callback depending on whether the map contains elements.
     *
     * @api
     */
    public function ifAnyOrElse(\Closure $then, \Closure $else): self
    {
        $ifAny = $this->collection->ifAny($then, $else);

        return self::of($ifAny);
    }
}
