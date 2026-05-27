<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Primitives\MixedAs;

final class MixedAsTest extends TestCase
{
    public function testStringWhenString(): void
    {
        self::assertSame('hello', (string) MixedAs::of('hello')->string());
    }

    public function testStringThrowsWhenNotString(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(42)->string();
    }

    public function testStringThrowsWhenNull(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(null)->string();
    }

    public function testIntWhenInt(): void
    {
        self::assertSame(42, MixedAs::of(42)->int()->value());
    }

    public function testIntThrowsWhenNotInt(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of('hello')->int();
    }

    public function testIntThrowsWhenNull(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(null)->int();
    }

    public function testNumericWhenFloat(): void
    {
        self::assertSame(3.14, MixedAs::of(3.14)->numeric()->value());
    }

    public function testNumericThrowsWhenString(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of('3.14')->numeric();
    }

    public function testNumericThrowsWhenNull(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(null)->numeric();
    }

    public function testNumericThrowsWhenInt(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(42)->numeric();
    }

    public function testBoolWhenTrue(): void
    {
        self::assertTrue(MixedAs::of(true)->bool()->isTrue());
    }

    public function testBoolWhenFalse(): void
    {
        self::assertTrue(MixedAs::of(false)->bool()->isFalse());
    }

    public function testBoolThrowsWhenInt(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(1)->bool();
    }

    public function testBoolThrowsWhenNull(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(null)->bool();
    }

    public function testArrayWhenArray(): void
    {
        self::assertCount(3, MixedAs::of([1, 2, 3])->array());
    }

    public function testArrayThrowsWhenNotArray(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of('hello')->array();
    }

    public function testArrayThrowsWhenNull(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        MixedAs::of(null)->array();
    }
}
