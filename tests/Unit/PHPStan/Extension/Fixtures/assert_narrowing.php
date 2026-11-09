<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Extension\Fixtures;

use TournayreLabs\Common\Assert\Assert;
use function PHPStan\Testing\assertType;

function notNull(?string $value): void
{
    Assert::notNull($value);
    assertType('string', $value);
}

function isInstanceOf(mixed $value): void
{
    Assert::isInstanceOf($value, \DateTimeInterface::class);
    assertType('DateTimeInterface', $value);
}
