<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\JoinInterface;

/**
 * Trait Join.
 *
 * @see JoinInterface
 */
trait Join
{
    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    public function join(string $glue = ''): string
    {
        return $this->collection->values()->join($glue);
    }
}
