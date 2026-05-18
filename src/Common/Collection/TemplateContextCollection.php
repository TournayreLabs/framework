<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

/**
 * @implements \IteratorAggregate<int|string, mixed>
 */
final class TemplateContextCollection implements \IteratorAggregate, AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'mixed');

        return new self(Collection::of($collection));
    }

    /**
     * @api
     *
     * @param mixed|null $offset
     */
    public function has($offset): Bool_
    {
        if (!\is_int($offset) && !\is_string($offset) && !\is_array($offset)) {
            return Bool_::asFalse();
        }

        return $this->collection
            ->has($offset)
        ;
    }
}
