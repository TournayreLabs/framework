<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface OffsetExistsInterface.
 */
interface OffsetExistsInterface
{
    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     */
    public function offsetExists(int|string $key): bool;
}
