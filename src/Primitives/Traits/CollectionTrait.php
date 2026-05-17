<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Primitives\Collection;

/**
 * Adds shared behavior for objects storing a Collection primitive.
 */
trait CollectionTrait
{
    use CollectionCommonTrait;

    private function __construct(
        protected Collection $collection,
    ) {
    }
}
