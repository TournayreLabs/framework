<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ShuffleInterface;

/**
 * Trait Shuffle.
 *
 * @see ShuffleInterface
 */
trait Shuffle
{
    /**
     * Randomizes the element order.
     *
     * @api
     */
    public function shuffle(bool $assoc = false): self
    {
        $shuffle = $this->collection->shuffle($assoc);

        return self::of($shuffle);
    }
}
