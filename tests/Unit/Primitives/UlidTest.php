<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\DateTime;
use TournayreLabs\Primitives\Ulid;

final class UlidTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testFromString(): void
    {
        $uuid = Ulid::fromString('01E439TP9XJZ9RPFH3T1PYBCR8');
        self::assertTrue($uuid->dateTime()->isSame(DateTime::of('2020-03-23 08:58:27.517000')->toDateTime())->isTrue());
        self::assertSame('01E439TP9XJZ9RPFH3T1PYBCR8', $uuid->toString());
        self::assertTrue($uuid->equalsTo(Ulid::fromString('01E439TP9XJZ9RPFH3T1PYBCR8'))->isTrue());
        self::assertTrue($uuid->toRfc4122()->equalsTo('0171069d-593d-97d3-8b3e-23d06de5b308')->isTrue());
    }
}
