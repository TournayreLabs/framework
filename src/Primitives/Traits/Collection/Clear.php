<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ClearInterface;

/**
 * Trait Clear.
 *
 * @see ClearInterface
 */
trait Clear
{
    /**
     * Removes all elements.
     *
     * @api
     */
    public function clear(): self
    {
        $clear = $this->collection->clear();

        return self::of($clear);
    }
}
