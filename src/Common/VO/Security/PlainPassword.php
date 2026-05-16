<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO\Security;

use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

final class PlainPassword implements NullableInterface
{
    use StringTypeTrait;
    use NullTrait;

    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
