<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Primitives\Bool_;

final class Bool_Test extends TestCase
{
    public function testAsTrue(): void
    {
        $bool = Bool_::asTrue();

        self::assertTrue($bool->isTrue());
        self::assertFalse($bool->isFalse());
        self::assertTrue($bool->asBool());
        self::assertSame(1, $bool->asInt());
        self::assertSame('true', $bool->asString());
    }

    public function testAsFalse(): void
    {
        $bool = Bool_::asFalse();

        self::assertTrue($bool->isFalse());
        self::assertFalse($bool->isTrue());
        self::assertFalse($bool->asBool());
        self::assertSame(0, $bool->asInt());
        self::assertSame('false', $bool->asString());
    }

    public function testFromBoolTrue(): void
    {
        self::assertTrue(Bool_::fromBool(true)->isTrue());
    }

    public function testFromBoolFalse(): void
    {
        self::assertTrue(Bool_::fromBool(false)->isFalse());
    }
}
