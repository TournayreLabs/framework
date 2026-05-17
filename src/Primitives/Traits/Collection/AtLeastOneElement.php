<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\AtLeastOneElementInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait AtLeastOneElement.
 *
 * @see AtLeastOneElementInterface
 */
trait AtLeastOneElement
{
    public function atLeastOneElement(): Bool_
    {
        return $this->count()->greaterThan(0);
    }
}
