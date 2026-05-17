<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Primitives\Collection;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Tests\Fixtures\Collection\CodeCollection;

final class StaticCollectionTest extends TestCase
{
    public function testCreateMapWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asMap()
            ->map(fn (String_ $value) => $value->toString())
            ->toArray()
        ;
        self::assertSame(['key1' => 'value1', 'key2' => 'value2'], $staticCollection);
    }

    public function testCreateListWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asList()
            ->map(fn (String_ $value) => $value->toString())
            ->toArray()
        ;
        self::assertSame(['value1', 'value2'], $staticCollection);
    }

    public function testJoin(): void
    {
        $staticCollection = CodeCollection::asList();
        self::assertSame('value1value2', $staticCollection->join());
        self::assertSame('value1/value2', $staticCollection->join('/'));
        self::assertSame("value1', 'value2", $staticCollection->join("', '"));
    }
}
