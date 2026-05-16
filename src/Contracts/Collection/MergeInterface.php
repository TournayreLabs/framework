<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Interface MergeInterface.
 */
interface MergeInterface
{
    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function merge($elements, bool $recursive = false): self;
}
