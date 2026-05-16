<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\HasSeveralElementsInterface;
use TournayreLabs\Primitives\BoolEnum;

/**
 * Trait HasSeveralElements.
 *
 * @see HasSeveralElementsInterface
 */
trait HasSeveralElements
{
    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()->greaterThan(1);
    }
}
