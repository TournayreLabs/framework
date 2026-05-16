<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface HasSeveralElementsInterface.
 */
interface HasSeveralElementsInterface
{
    public function hasSeveralElements(): BoolEnum;
}
