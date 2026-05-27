<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\MergeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Mixed_;

/**
 * Trait Merge.
 *
 * @see MergeInterface
 */
trait Merge
{
    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function merge($elements, bool $recursive = false): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if (Mixed_::of($elements)->is()->instanceOf(static::class)->isTrue()) {
            $elements = $elements->toArray();
        }

        $merge = $this->collection->merge($elements, $recursive);

        return self::of($merge);
    }
}
