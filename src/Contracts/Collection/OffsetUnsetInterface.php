<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface OffsetUnsetInterface.
 */
interface OffsetUnsetInterface
{
    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    public function offsetUnset($key): void;
}
