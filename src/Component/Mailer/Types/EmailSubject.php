<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

final class EmailSubject implements NullableInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function of(string $value): self
    {
        Assert::stringNotEmpty($value, 'Email subject cannot be empty.');

        return new self(StringType::of($value));
    }

    /**
     * @api
     */
    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
