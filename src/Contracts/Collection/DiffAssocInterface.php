<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Collection;

/**
 * Interface DiffAssocInterface.
 */
interface DiffAssocInterface
{
    /**
     * Returns the elements missing in the given list and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffAssoc($elements, ?callable $callback = null): self;
}
