<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface DumpInterface.
 */
interface DumpInterface
{
    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(): self;

    /**
     * Prints the map content using a callback.
     *
     * @api
     */
    public function dumpWith(\Closure $callback): self;
}
