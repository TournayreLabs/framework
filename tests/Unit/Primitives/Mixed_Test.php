<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Primitives\Mixed_;

final class Mixed_Test extends TestCase
{
    public function testOfCreatesInstance(): void
    {
        $mixed = Mixed_::of('hello');

        self::assertSame('hello', $mixed->get());
    }

    public function testGetReturnsRawValue(): void
    {
        self::assertSame(42, Mixed_::of(42)->get());
    }

    public function testOfAcceptsNull(): void
    {
        self::assertNull(Mixed_::of(null)->get());
    }

    public function testIsReturnsMixedIs(): void
    {
        /** @var mixed $value */
        $value = 'hello';
        self::assertTrue(Mixed_::of($value)->is()->string()->isTrue());
    }

    public function testAsReturnsMixedAs(): void
    {
        self::assertSame('hello', (string) Mixed_::of('hello')->as()->string());
    }
}
