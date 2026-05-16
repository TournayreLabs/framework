<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface HasOneElementInterface.
 */
interface HasOneElementInterface
{
    public function hasOneElement(): BoolEnum;
}
