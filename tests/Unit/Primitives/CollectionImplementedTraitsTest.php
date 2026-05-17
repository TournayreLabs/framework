<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;

final class CollectionImplementedTraitsTest extends TestCase
{
    public function testFromCreatesCollectionFromPassedElements(): void
    {
        self::assertSame(['a' => 'foo'], Collection::from(['a' => 'foo'])->toArray());
        self::assertSame(['foo'], Collection::from('foo')->toArray());
    }

    public function testFromJsonCreatesCollectionFromJsonString(): void
    {
        self::assertSame(['a' => 'foo'], Collection::fromJson('{"a":"foo"}')->toArray());
    }

    public function testFromJsonWrapsInvalidJsonErrors(): void
    {
        $this->expectException(ThrowableInterface::class);

        Collection::fromJson('{invalid')->toArray();
    }

    public function testFindReturnsMatchingElement(): void
    {
        self::assertSame('bar', Collection::of(['foo', 'bar'])->find(
            static fn (string $value): bool => str_starts_with($value, 'b'),
        ));
    }

    public function testFindThrowsWhenNoElementMatches(): void
    {
        $this->expectException(ThrowableInterface::class);

        Collection::of(['foo'])->find(
            static fn (string $value): bool => str_starts_with($value, 'b'),
        );
    }

    public function testJsonSerializeReturnsSerializableArray(): void
    {
        self::assertSame(['a' => 'foo'], Collection::of(['a' => 'foo'])->jsonSerialize());
    }

    public function testCallInvokesMethodOnObjectItemsOnly(): void
    {
        $collection = Collection::of([
            'first' => new CollectionCallableFixture('foo'),
            'skip' => 'bar',
            'second' => new CollectionCallableFixture('baz'),
        ]);

        self::assertSame(
            ['first' => 'foo!', 'second' => 'baz!'],
            $collection->call('suffix', ['!'])->toArray(),
        );
    }

    public function testIfEmptyExecutesThenCallbackOnlyForEmptyCollection(): void
    {
        $empty = Collection::of([])->ifEmptyOrElse(
            static fn ($map) => $map->push('created'),
            static fn ($map) => $map->push('ignored'),
        );

        $filled = Collection::of(['existing'])->ifEmptyOrElse(
            static fn ($map) => $map->push('ignored'),
            static fn ($map) => $map->push('kept'),
        );

        self::assertSame(['created'], $empty->toArray());
        self::assertSame(['existing', 'kept'], $filled->toArray());
    }

    public function testGetIteratorReturnsIteratorOverElements(): void
    {
        $iterator = Collection::of(['a' => 'foo', 'b' => 'bar'])->getIterator();

        self::assertSame(['a' => 'foo', 'b' => 'bar'], iterator_to_array($iterator));
    }

    public function testDelimiterReturnsPreviousSeparatorAndUpdatesFutureSeparator(): void
    {
        $previous = Collection::delimiter();

        try {
            self::assertSame($previous, Collection::delimiter('.'));
            self::assertSame('value', Collection::of(['path' => ['to' => 'value']])->get('path.to'));
        } finally {
            Collection::delimiter($previous);
        }
    }
}

final readonly class CollectionCallableFixture
{
    public function __construct(
        private string $value,
    ) {
    }

    /**
     * @api
     */
    public function suffix(string $suffix): string
    {
        return $this->value.$suffix;
    }
}
