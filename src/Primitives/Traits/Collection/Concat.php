<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\ConcatInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait Concat.
 *
 * @see ConcatInterface
 */
trait Concat
{
    /**
     * Adds all elements with new keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function concat($elements): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $concat = $this->collection->concat($elements);

        return self::of($concat);
    }
}
