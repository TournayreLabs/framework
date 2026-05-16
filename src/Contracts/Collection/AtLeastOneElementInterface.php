<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface AtLeastOneElementInterface.
 */
interface AtLeastOneElementInterface
{
    public function atLeastOneElement(): BoolEnum;
}
