<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DdInterface;

/**
 * Trait Dd.
 *
 * @see DdInterface
 */
trait Dd
{
    /**
     * Prints the map content and terminates the script.
     *
     * @api
     */
    public function dd(): void
    {
        $this->collection->dd();
    }

    /**
     * @api
     */
    public function ddWith(\Closure $callback): void
    {
        $this->collection->dd($callback);
    }
}
