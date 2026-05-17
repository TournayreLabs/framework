<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\HasSeveralElementsInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait HasSeveralElements.
 *
 * @see HasSeveralElementsInterface
 */
trait HasSeveralElements
{
    public function hasSeveralElements(): Bool_
    {
        return $this->count()->greaterThan(1);
    }
}
