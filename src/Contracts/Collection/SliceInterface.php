<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface SliceInterface.
 */
interface SliceInterface
{
    /**
     * Returns a slice of the map.
     *
     * @param int $offset Number of elements to start from
     *
     * @api
     */
    public function slice(int $offset): self;

    /**
     * Returns a slice of the map with a length limit.
     *
     * @param int $offset Number of elements to start from
     * @param int $length Number of elements to return
     *
     * @api
     */
    public function sliceWithLength(int $offset, int $length): self;
}
