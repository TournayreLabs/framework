<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use TournayreLabs\Primitives\BoolEnum;
use PHPUnit\Framework\TestCase;

final class BoolEnumTest extends TestCase
{
    public function testAsTrue(): void
    {
        $bool = BoolEnum::asTrue();

        self::assertTrue($bool->isTrue());
        self::assertFalse($bool->isFalse());
        self::assertTrue($bool->asBool());
        self::assertSame(1, $bool->asInt());
        self::assertSame('true', $bool->asString());
    }

    public function testAsFalse(): void
    {
        $bool = BoolEnum::asFalse();

        self::assertTrue($bool->isFalse());
        self::assertFalse($bool->isTrue());
        self::assertFalse($bool->asBool());
        self::assertSame(0, $bool->asInt());
        self::assertSame('false', $bool->asString());
    }

    public function testFromBoolTrue(): void
    {
        self::assertTrue(BoolEnum::fromBool(true)->isTrue());
    }

    public function testFromBoolFalse(): void
    {
        self::assertTrue(BoolEnum::fromBool(false)->isFalse());
    }
}
