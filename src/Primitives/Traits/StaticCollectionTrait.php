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
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     */
    public function add($value, ?\Closure $callback = null): self
    {
        throw BadMethodCallException::new('Static collections cannot be modified.');
    }

    /**
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     */
    public function set($key, $value, ?\Closure $callback = null): self
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
