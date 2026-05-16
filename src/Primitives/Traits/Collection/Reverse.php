<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ReverseInterface;

/**
 * Trait Reverse.
 *
 * @see ReverseInterface
 */
trait Reverse
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse(): self
    {
        $reverse = $this->collection->reverse();

        return self::of($reverse);
    }
}
