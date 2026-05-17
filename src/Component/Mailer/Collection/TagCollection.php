<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

/**
 * @implements \IteratorAggregate<int|string, mixed>
 */
final class TagCollection implements \IteratorAggregate, LoggableInterface, AsMapInterface
{
    use CollectionTrait;

    private const TAG_MIN_LENGTH = 3;

    private const TAG_MAX_LENGTH = 5;

    /**
     * @param array<string, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'string');

        $collection1 = Collection::of($collection)
            ->each(fn (string $tag) => self::validateElement($tag))
        ;

        return new self($collection1);
    }

    /**
     * @throws ThrowableInterface
     */
    private static function validateElement(string $value): void
    {
        Assert::lengthBetween(
            $value,
            self::TAG_MIN_LENGTH,
            self::TAG_MAX_LENGTH,
            sprintf('Tag "%s" length must be between %d and %d characters', $value, self::TAG_MIN_LENGTH, self::TAG_MAX_LENGTH)
        );
    }

    /**
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->collection
            ->toArray()
        ;
    }
}
