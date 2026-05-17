<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\HasXElementsInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait HasXElements.
 *
 * @see HasXElementsInterface
 */
trait HasXElements
{
    public function hasXElements(int $int): Bool_
    {
        return $this->count()->equalsTo($int);
    }
}
