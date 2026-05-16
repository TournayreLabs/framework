<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Collection;

/**
 * Interface IntersectAssocInterface.
 */
interface IntersectAssocInterface
{
    /**
     * Returns the elements shared and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectAssoc($elements, ?callable $callback = null): self;
}
