<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface SpliceInterface.
 */
interface SpliceInterface
{
    /**
     * Removes elements from the given offset.
     *
     * @param int $offset Number of elements to start from
     *
     * @api
     */
    public function splice(int $offset): self;

    /**
     * Removes a number of elements from the given offset.
     *
     * @param int $offset Number of elements to start from
     * @param int $length Number of elements to remove
     *
     * @api
     */
    public function spliceWithLength(int $offset, int $length): self;

    /**
     * Replaces elements from the given offset with replacement.
     *
     * @param int   $offset      Number of elements to start from
     * @param mixed $replacement List of elements to insert
     *
     * @api
     */
    public function spliceReplacing(int $offset, mixed $replacement): self;

    /**
     * Replaces a number of elements from the given offset with replacement.
     *
     * @param int   $offset      Number of elements to start from
     * @param int   $length      Number of elements to remove
     * @param mixed $replacement List of elements to insert
     *
     * @api
     */
    public function spliceReplacingWithLength(int $offset, int $length, mixed $replacement): self;
}
