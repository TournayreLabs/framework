<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO\Security;

use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents a plain password value with nullable null-object support.
 *
 * Use asNull() when the password is intentionally absent.
 */
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
