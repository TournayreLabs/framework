<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Primitives\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection\DateTimeCollection;
use TournayreLabs\Primitives\DateTime;
use PHPUnit\Framework\TestCase;

final class DateTimeCollectionTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testSortAsc(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-05'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-01'),
        ])->sortAsc();

        self::assertTrue($collection->count()->equalsTo(5)->isTrue());
        self::assertEquals(DateTime::of('2021-01-01'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-05'), $collection->last());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testSortDesc(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->sortDesc();

        self::assertTrue($collection->count()->equalsTo(5)->isTrue());
        self::assertEquals(DateTime::of('2021-01-05'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-01'), $collection->last());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testMostRecent(): void
    {
        $datetime = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->mostRecent();

        self::assertEquals(DateTime::of('2021-01-05'), $datetime);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testOldest(): void
    {
        $datetime = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->oldest();

        self::assertEquals(DateTime::of('2021-01-01'), $datetime);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testDatesBetween(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->between(DateTime::of('2021-01-02'), DateTime::of('2021-01-04'));
        $datesArray = $dates->toArray();

        self::assertTrue($dates->count()->equalsTo(3)->isTrue());
        self::assertEquals(DateTime::of('2021-01-02'), $datesArray[0]);
        self::assertEquals(DateTime::of('2021-01-03'), $datesArray[1]);
        self::assertEquals(DateTime::of('2021-01-04'), $datesArray[2]);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testDatesBefore(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->before(DateTime::of('2021-01-03'));
        $datesArray = $dates->toArray();

        self::assertTrue($dates->count()->equalsTo(2)->isTrue());
        self::assertEquals(DateTime::of('2021-01-01'), $datesArray[0]);
        self::assertEquals(DateTime::of('2021-01-02'), $datesArray[1]);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testDatesAfter(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->after(DateTime::of('2021-01-03'));
        $datesArray = $dates->toArray();

        self::assertTrue($dates->count()->equalsTo(2)->isTrue());
        self::assertEquals(DateTime::of('2021-01-04'), $datesArray[0]);
        self::assertEquals(DateTime::of('2021-01-05'), $datesArray[1]);
    }
}
