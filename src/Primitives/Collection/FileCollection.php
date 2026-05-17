<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\VO\Memory;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;
use TournayreLabs\Wrapper\SplFileInfo;

/**
 * @implements \IteratorAggregate<int|string, SplFileInfo>
 */
final class FileCollection implements \IteratorAggregate, LoggableInterface, AsListInterface, AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, SplFileInfo::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByExtension(string $extension): self
    {
        $array = $this
            ->collection
            ->filterWith(static fn (SplFileInfo $file): bool => $file->extension()->equalsTo($extension)->isTrue())
            ->values()
            ->toArray()
        ;
        /** @var array<int, SplFileInfo> $array */

        return FileCollection::asList($array);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterBySize(int $size): self
    {
        $array = $this
            ->collection
            ->filterWith(static fn (SplFileInfo $file): bool => $file->size()->equalsTo($size)->isTrue())
            ->values()
            ->toArray()
        ;
        /** @var array<int, SplFileInfo> $array */

        return FileCollection::asList($array);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByContent(string $content): FileCollection
    {
        $array = $this
            ->collection
            ->filterWith(static fn (SplFileInfo $file): bool => $file->contents()->containsAny($content)->isTrue())
            ->values()
            ->toArray()
        ;
        /** @var array<int, SplFileInfo> $array */

        return FileCollection::asList($array);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function totalSize(): Memory
    {
        $sizeInBytes = $this
            ->collection
            ->map(static fn (SplFileInfo $file) => $file->size()->asIs())
            ->sum()
            ->intValue()
        ;

        return Memory::fromBytes($sizeInBytes);
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function toLog(): array
    {
        return $this->collection
            ->map(static fn (SplFileInfo $file): array => $file->toLog())
            ->toArray()
        ;
    }
}
