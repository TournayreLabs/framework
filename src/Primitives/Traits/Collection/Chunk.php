<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ChunkInterface;

/**
 * Trait Chunk.
 *
 * @see ChunkInterface
 */
trait Chunk
{
    /**
     * Splits the map into chunks.
     *
     * @api
     */
    public function chunk(int $size, bool $preserve = false): self
    {
        $chunk = $this->collection->chunk($size, $preserve);

        return self::of($chunk);
    }
}
