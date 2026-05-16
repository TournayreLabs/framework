<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface HasNoElementInterface.
 */
interface HasNoElementInterface
{
    public function hasNoElement(): BoolEnum;
}
