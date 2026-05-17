<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Common\Exception\BadMethodCallException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;

/**
 * @deprecated Use Collection::readOnly())
 */
trait StaticCollectionTrait
{
    use CollectionCommonTrait;

    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param mixed $value
     *
     * @throws ThrowableInterface
     */
    public function add(mixed $value): self
    {
        throw BadMethodCallException::new('Static collections cannot be modified.');
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @throws ThrowableInterface
     */
    public function set(mixed $key, mixed $value): self
    {
        throw BadMethodCallException::new('Static collections cannot be modified.');
    }

    /**
     * @param array-key $offset
     *
     * @throws ThrowableInterface
     */
    public function offsetUnset($offset): void
    {
        throw BadMethodCallException::new('Static collections cannot be modified.');
    }
}
