<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\PHPStan;

use TournayreLabs\Primitives\Mixed_;
use TournayreLabs\Primitives\String_;

/**
 * Ce fichier sert de fixture PHPStan : il doit passer sans erreur après analyse.
 * Chaque fonction illustre le narrowing de type via Mixed_::of()->is()->*()->isTrue().
 */
function testStringNarrowing(mixed $value): String_
{
    if (Mixed_::of($value)->is()->string()->isTrue()) {
        return String_::fromString($value); // sans l'extension : "Argument of type mixed"
    }

    throw new \InvalidArgumentException('Not a string');
}

function testIntNarrowing(mixed $value): int
{
    if (Mixed_::of($value)->is()->int()->isTrue()) {
        return $value + 1; // sans l'extension : "Operator + between mixed and 1"
    }

    throw new \InvalidArgumentException('Not an int');
}

function testFloatNarrowing(mixed $value): float
{
    if (Mixed_::of($value)->is()->float()->isTrue()) {
        return $value * 2.0; // sans l'extension : "Operator * between mixed and float"
    }

    throw new \InvalidArgumentException('Not a float');
}

function testBoolNarrowing(mixed $value): bool
{
    if (Mixed_::of($value)->is()->bool()->isTrue()) {
        return !$value; // sans l'extension : "Unary ! applied to mixed"
    }

    throw new \InvalidArgumentException('Not a bool');
}

function testArrayNarrowing(mixed $value): int
{
    if (Mixed_::of($value)->is()->array()->isTrue()) {
        return count($value); // sans l'extension : "Argument of type mixed to count()"
    }

    throw new \InvalidArgumentException('Not an array');
}

function testNullNarrowing(mixed $value): ?string
{
    if (Mixed_::of($value)->is()->null()->isTrue()) {
        return null; // sans l'extension : PHPStan ne saurait pas que $value est null
    }

    return 'not null';
}
