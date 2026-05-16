<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface HasXElementsInterface.
 */
interface HasXElementsInterface
{
    public function hasXElements(int $int): BoolEnum;
}
