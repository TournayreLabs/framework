<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface AtLeastOneElementInterface.
 */
interface AtLeastOneElementInterface
{
    public function atLeastOneElement(): Bool_;
}
