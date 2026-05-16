<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Primitives\Collection;

trait CollectionTrait
{
    use CollectionCommonTrait;

    private function __construct(
        protected Collection $collection,
    ) {
    }
}
