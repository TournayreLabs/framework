<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\HasNoElementInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait HasNoElement.
 *
 * @see HasNoElementInterface
 */
trait HasNoElement
{
    public function hasNoElement(): Bool_
    {
        return $this->count()->equalsTo(0);
    }
}
