<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\CallInterface;

/**
 * Trait Call.
 *
 * @see CallInterface
 */
trait Call
{
    /**
     * Calls the given method on all items.
     *
     * @param array<int, mixed> $params
     *
     * @api
     */
    public function call(string $name, array $params = []): self
    {
        $call = $this->collection->call($name, $params);

        return self::of($call);
    }
}
