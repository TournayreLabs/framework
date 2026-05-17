<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

/**
 * @implements \IteratorAggregate<int|string, mixed>
 */
final class DateTimeCollection implements \IteratorAggregate, AsListInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, DateTimeInterface::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sortAsc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->collection
            ->usort(static fn (DateTimeInterface $a, DateTimeInterface $b) => $a <=> $b)
            ->values()
            ->toArray()
        ;
        /** @var array<int, DateTimeInterface> $values */

        return DateTimeCollection::asList($values);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sortDesc(): self
    {
        $clone = clone $this;
        $values = $clone
            ->collection
            ->usort(static fn (DateTimeInterface $a, DateTimeInterface $b) => $b <=> $a)
            ->values()
            ->toArray()
        ;
        /** @var array<int, DateTimeInterface> $values */

        return DateTimeCollection::asList($values);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function mostRecent(): DateTimeInterface
    {
        return $this
            ->sortDesc()
            ->collection
            ->first()
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function oldest(): DateTimeInterface
    {
        return $this
            ->sortAsc()
            ->collection
            ->first()
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function between(DateTimeInterface $start, DateTimeInterface $end): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filterWith(static fn (DateTimeInterface $date) => $date >= $start && $date <= $end)
            ->values()
            ->toArray()
        ;
        /** @var array<int, DateTimeInterface> $map */

        return DateTimeCollection::asList($map);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function before(DateTimeInterface $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filterWith(static fn (DateTimeInterface $d) => $d < $date)
            ->values()
            ->toArray()
        ;
        /** @var array<int, DateTimeInterface> $map */

        return DateTimeCollection::asList($map);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function after(DateTimeInterface $date): self
    {
        $clone = clone $this;
        $map = $clone
            ->collection
            ->filterWith(static fn (DateTimeInterface $d) => $d > $date)
            ->values()
            ->toArray()
        ;
        /** @var array<int, DateTimeInterface> $map */

        return DateTimeCollection::asList($map);
    }
}
