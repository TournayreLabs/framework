<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Collection;

/**
 * Interface IntersectInterface.
 */
interface IntersectInterface
{
    /**
     * Returns the elements shared.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersect($elements, ?callable $callback = null): self;
}
