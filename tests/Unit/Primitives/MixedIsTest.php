<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Primitives\MixedIs;

final class MixedIsTest extends TestCase
{
    public function testNullWhenNull(): void
    {
        self::assertTrue(MixedIs::of(null)->null()->isTrue());
    }

    public function testNullWhenNotNull(): void
    {
        self::assertTrue(MixedIs::of('foo')->null()->isFalse());
    }

    public function testStringWhenString(): void
    {
        self::assertTrue(MixedIs::of('hello')->string()->isTrue());
    }

    public function testStringWhenInt(): void
    {
        self::assertTrue(MixedIs::of(42)->string()->isFalse());
    }

    public function testIntWhenInt(): void
    {
        self::assertTrue(MixedIs::of(42)->int()->isTrue());
    }

    public function testIntWhenString(): void
    {
        self::assertTrue(MixedIs::of('42')->int()->isFalse());
    }

    public function testFloatWhenFloat(): void
    {
        self::assertTrue(MixedIs::of(3.14)->float()->isTrue());
    }

    public function testFloatWhenInt(): void
    {
        self::assertTrue(MixedIs::of(42)->float()->isFalse());
    }

    public function testBoolWhenTrue(): void
    {
        self::assertTrue(MixedIs::of(true)->bool()->isTrue());
    }

    public function testBoolWhenFalse(): void
    {
        self::assertTrue(MixedIs::of(false)->bool()->isTrue());
    }

    public function testBoolWhenInt(): void
    {
        self::assertTrue(MixedIs::of(1)->bool()->isFalse());
    }

    public function testArrayWhenArray(): void
    {
        self::assertTrue(MixedIs::of([])->array()->isTrue());
    }

    public function testArrayWhenObject(): void
    {
        self::assertTrue(MixedIs::of(new \stdClass())->array()->isFalse());
    }

    public function testObjectWhenObject(): void
    {
        self::assertTrue(MixedIs::of(new \stdClass())->object()->isTrue());
    }

    public function testObjectWhenString(): void
    {
        self::assertTrue(MixedIs::of('hello')->object()->isFalse());
    }

    public function testNumericWhenInt(): void
    {
        self::assertTrue(MixedIs::of(42)->numeric()->isTrue());
    }

    public function testNumericWhenFloat(): void
    {
        self::assertTrue(MixedIs::of(3.14)->numeric()->isTrue());
    }

    public function testNumericWhenNumericString(): void
    {
        self::assertTrue(MixedIs::of('42')->numeric()->isTrue());
    }

    public function testNumericWhenNonNumericString(): void
    {
        self::assertTrue(MixedIs::of('hello')->numeric()->isFalse());
    }

    public function testScalarWhenString(): void
    {
        self::assertTrue(MixedIs::of('hello')->scalar()->isTrue());
    }

    public function testScalarWhenArray(): void
    {
        self::assertTrue(MixedIs::of([])->scalar()->isFalse());
    }

    public function testScalarWhenNull(): void
    {
        self::assertTrue(MixedIs::of(null)->scalar()->isFalse());
    }

    public function testCallableWhenClosure(): void
    {
        self::assertTrue(MixedIs::of(static fn () => null)->callable()->isTrue());
    }

    public function testCallableWhenString(): void
    {
        self::assertTrue(MixedIs::of('not_callable_xyz')->callable()->isFalse());
    }

    public function testInstanceOfWhenMatch(): void
    {
        self::assertTrue(MixedIs::of(new \stdClass())->instanceOf(\stdClass::class)->isTrue());
    }

    public function testInstanceOfWhenNoMatch(): void
    {
        self::assertTrue(MixedIs::of(new \stdClass())->instanceOf(\DateTime::class)->isFalse());
    }

    public function testInstanceOfWhenNotObject(): void
    {
        self::assertTrue(MixedIs::of('hello')->instanceOf(\stdClass::class)->isFalse());
    }

    public function testInstanceOfWhenNull(): void
    {
        self::assertTrue(MixedIs::of(null)->instanceOf(\stdClass::class)->isFalse());
    }

    public function testInstanceOfWhenNonexistentClass(): void
    {
        self::assertTrue(MixedIs::of(new \stdClass())->instanceOf('NonExistentClassXyz')->isFalse());
    }
}
