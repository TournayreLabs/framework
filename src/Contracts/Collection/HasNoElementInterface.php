<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface HasNoElementInterface.
 */
interface HasNoElementInterface
{
    public function hasNoElement(): Bool_;
}
