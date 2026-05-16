<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Primitives\Int_;

trait IntegerTrait
{
    protected Int_ $integer;

    private function __construct(Int_ $integer)
    {
        $this->integer = $integer;
    }

    /**
     * @param int|string|Int_ $value
     */
    public static function of($value): self
    {
        return new self(Int_::of($value));
    }
}
