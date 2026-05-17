<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface HasXElementsInterface.
 */
interface HasXElementsInterface
{
    public function hasXElements(int $int): Bool_;
}
