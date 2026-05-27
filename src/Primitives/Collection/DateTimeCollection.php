<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Mixed_;
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

        return self::fromCollection(Collection::of($collection));
    }

    private static function fromCollection(Collection $collection): self
    {
        return new self($collection);
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
        ;

        return self::fromCollection($values);
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
        ;

        return self::fromCollection($values);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function mostRecent(): DateTimeInterface
    {
        $dateTime = $this
            ->sortDesc()
            ->collection
            ->first()
        ;
        Assert::isInstanceOf($dateTime, DateTimeInterface::class);
        if (Mixed_::of($dateTime)->is()->instanceOf(DateTimeInterface::class)->isFalse()) {
            throw RuntimeException::new('Unexpected DateTime value');
        }

        return $dateTime;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function oldest(): DateTimeInterface
    {
        $dateTime = $this
            ->sortAsc()
            ->collection
            ->first()
        ;
        Assert::isInstanceOf($dateTime, DateTimeInterface::class);
        if (Mixed_::of($dateTime)->is()->instanceOf(DateTimeInterface::class)->isFalse()) {
            throw RuntimeException::new('Unexpected DateTime value');
        }

        return $dateTime;
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
        ;

        return self::fromCollection($map);
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
        ;

        return self::fromCollection($map);
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
        ;

        return self::fromCollection($map);
    }
}
