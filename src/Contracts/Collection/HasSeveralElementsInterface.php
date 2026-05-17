<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface HasSeveralElementsInterface.
 */
interface HasSeveralElementsInterface
{
    public function hasSeveralElements(): Bool_;
}
