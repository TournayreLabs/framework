<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Holds plain text body content for an e-mail as an immutable value.
 *
 * Use of() for validated content and asNull() for null-object semantics.
 */
final class EmailText implements NullableInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function of(string $value): self
    {
        Assert::stringNotEmpty($value, 'Email text cannot be empty.');

        return new self(String_::fromString($value));
    }

    public static function asNull(): self
    {
        return (new self(String_::fromString('')))
            ->toNullable()
        ;
    }
}
