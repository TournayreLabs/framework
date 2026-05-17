<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO\Security;

use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

final class PlainPassword implements NullableInterface
{
    use StringTypeTrait;
    use NullTrait;

    public static function asNull(): self
    {
        return (new self(String_::fromString('')))
            ->toNullable()
        ;
    }
}
