<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\HasOneElementInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait HasOneElement.
 *
 * @see HasOneElementInterface
 */
trait HasOneElement
{
    public function hasOneElement(): Bool_
    {
        return $this->count()->equalsTo(1);
    }
}
