<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IfEmptyInterface;

/**
 * Trait IfEmpty.
 *
 * @see IfEmptyInterface
 */
trait IfEmpty
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @api
     */
    public function ifEmpty(\Closure $then): self
    {
        return self::of($this->collection->ifEmpty($then));
    }

    /**
     * @api
     */
    public function ifEmptyOrElse(\Closure $then, \Closure $else): self
    {
        return self::of($this->collection->ifEmpty($then, $else));
    }
}
