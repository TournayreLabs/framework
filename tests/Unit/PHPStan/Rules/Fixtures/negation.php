<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures;

function negate(bool $value): bool
{
    return !$value;
}

function noNegation(bool $value): bool
{
    return false === $value;
}
