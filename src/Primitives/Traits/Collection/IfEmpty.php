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
    public function ifEmpty(?\Closure $then = null, ?\Closure $else = null): self
    {
        $ifEmpty = $this->collection->ifEmpty($then, $else);

        return self::of($ifEmpty);
    }
}
