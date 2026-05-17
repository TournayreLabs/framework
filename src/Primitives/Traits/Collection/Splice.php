<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\SpliceInterface;

/**
 * Trait Splice.
 *
 * @see SpliceInterface
 */
trait Splice
{
    /**
     * Removes elements from the given offset.
     *
     * @param int $offset Number of elements to start from
     *
     * @api
     */
    public function splice(int $offset): self
    {
        $splice = $this->collection->splice($offset);

        return self::of($splice);
    }

    /**
     * Removes a number of elements from the given offset.
     *
     * @param int $offset Number of elements to start from
     * @param int $length Number of elements to remove
     *
     * @api
     */
    public function spliceWithLength(int $offset, int $length): self
    {
        $splice = $this->collection->splice($offset, $length);

        return self::of($splice);
    }

    /**
     * Replaces elements from the given offset with replacement.
     *
     * @param int   $offset      Number of elements to start from
     * @param mixed $replacement List of elements to insert
     *
     * @api
     */
    public function spliceReplacing(int $offset, mixed $replacement): self
    {
        $splice = $this->collection->splice($offset, null, $replacement);

        return self::of($splice);
    }

    /**
     * Replaces a number of elements from the given offset with replacement.
     *
     * @param int   $offset      Number of elements to start from
     * @param int   $length      Number of elements to remove
     * @param mixed $replacement List of elements to insert
     *
     * @api
     */
    public function spliceReplacingWithLength(int $offset, int $length, mixed $replacement): self
    {
        $splice = $this->collection->splice($offset, $length, $replacement);

        return self::of($splice);
    }
}
