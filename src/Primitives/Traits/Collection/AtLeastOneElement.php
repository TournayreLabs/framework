<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AtLeastOneElementInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait AtLeastOneElement.
 *
 * @see AtLeastOneElementInterface
 */
trait AtLeastOneElement
{
    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()->greaterThan(0);
    }
}
