<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Collection\Validation;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

final class ValidationCollection implements \IteratorAggregate, AsMapInterface
{
    use CollectionTrait;

    /**
     * @param array<string, string|mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'string');

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addIf(string $key, string $message, \Closure $condition): self
    {
        if (!$condition()) {
            return $this;
        }

        $clone = clone $this;
        $clone->collection->set($key, $message);

        return $clone;
    }

    public function isValid(): BoolEnum
    {
        return $this->hasNoElement();
    }

    /**
     * @api
     */
    public function toString(string $glue = ', '): string
    {
        return $this->collection
            ->join($glue)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function throwException(string $glue = ', '): void
    {
        if ($this->hasNoElement()->yes()) {
            return;
        }

        RuntimeException::new($this->toString($glue))->throw();
    }
}
