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
    public function dump(?callable $callback = null): self
    {
        $dump = $this->collection->dump($callback);

        return self::of($dump);
    }
}
