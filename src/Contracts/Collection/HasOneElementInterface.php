<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface HasOneElementInterface.
 */
interface HasOneElementInterface
{
    public function hasOneElement(): Bool_;
}
