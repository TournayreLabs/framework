<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\PHPStan;

use TournayreLabs\Common\Assert\Assert;
use function PHPStan\Testing\assertType;

/**
 * Fixture analysée par PHPStan : chaque assertType() échoue si le type n'est pas restreint
 * par les annotations @phpstan-assert de TournayreLabs\Common\Assert\Assert.
 */
function testAssertStringNarrowing(mixed $value): void
{
    Assert::string($value);
    assertType('string', $value);
}

function testAssertIntegerNarrowing(mixed $value): void
{
    Assert::integer($value);
    assertType('int', $value);
}

function testAssertIsInstanceOfNarrowing(mixed $value): void
{
    Assert::isInstanceOf($value, \DateTimeInterface::class);
    assertType('DateTimeInterface', $value);
}

function testAssertNotNullNarrowing(?string $value): void
{
    Assert::notNull($value);
    assertType('string', $value);
}

function testAssertNullOrStringNarrowing(mixed $value): void
{
    Assert::nullOrString($value);
    assertType('string|null', $value);
}

function testAssertAllStringNarrowing(mixed $value): void
{
    Assert::allString($value);
    assertType('iterable<string>', $value);
}
