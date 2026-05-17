<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Fixtures\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\CollectionValidationInterface;
use TournayreLabs\Contracts\Collection\NumericListInterface;
use TournayreLabs\Contracts\Collection\NumericMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\NumericCollectionTrait;
use TournayreLabs\Tests\Fixtures\Price;

final class PriceCollection implements NumericListInterface, NumericMapInterface, CollectionValidationInterface
{
    use NumericCollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public function validateCollection(): void
    {
        $every = $this->collection
            ->every(static fn ($element) => method_exists($element, 'value'))
        ;

        Assert::true($every->isTrue(), 'All elements must be Numeric.');

        $this
            ->collection
            ->filterWith(fn (Price $price) => $price->lessThan(0)->yes())
            ->atLeastOneElement()
            ->throwIfTrue('Negative price is not allowed.')
        ;
    }

    /**
     * @api
     */
    public function rekey(callable $callback): self
    {
        $collection = $this->collection
            ->rekey($callback)
            ->toArray()
        ;

        return new self(Collection::of($collection), $this->precision);
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection, int $precision): self
    {
        $priceCollection = new self(Collection::of($collection), $precision);

        $priceCollection->validateCollection();

        return $priceCollection;
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection, int $precision): self
    {
        $priceCollection = new self(Collection::of($collection), $precision);

        $priceCollection->validateCollection();

        return $priceCollection;
    }
}
