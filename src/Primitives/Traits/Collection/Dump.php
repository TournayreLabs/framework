<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\DumpInterface;

/**
 * Trait Dump.
 *
 * @see DumpInterface
 */
trait Dump
{
    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(): self
    {
        $dump = $this->collection->dump();

        return self::of($dump);
    }

    /**
     * Prints the map content using a callback.
     *
     * @api
     */
    public function dumpWith(\Closure $callback): self
    {
        $dump = $this->collection->dump($callback);

        return self::of($dump);
    }
}
