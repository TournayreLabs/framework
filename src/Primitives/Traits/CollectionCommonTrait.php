<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Int_;

/**
 * @internal
 */
trait CollectionCommonTrait
{
    public function count(): Int_
    {
        return $this->collection
            ->count()
        ;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * @throws ThrowableInterface
     */
    public function first(): mixed
    {
        try {
            return $this->collection->first();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function last(): mixed
    {
        try {
            return $this->collection->last();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @param array-key $offset
     *
     * @return mixed|null
     */
    protected function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * @param array-key $offset
     */
    protected function offsetUnset($offset): void
    {
        $this->collection->offsetUnset($offset);
    }

    /**
     * @throws ThrowableInterface
     */
    public function atLeastOneElement(): Bool_
    {
        return $this->count()
            ->greaterThan(0)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function hasSeveralElements(): Bool_
    {
        return $this->count()
            ->greaterThan(1)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function hasNoElement(): Bool_
    {
        return $this->count()
            ->equalsTo(0)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function hasOneElement(): Bool_
    {
        return $this->count()
            ->equalsTo(1)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function hasXElements(int $int): Bool_
    {
        return $this->count()
            ->equalsTo($int)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    protected function add(mixed $value): self
    {
        $this->ensureMutable('add');

        $clone = clone $this;
        $clone->collection->push($value);

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     */
    protected function set(mixed $key, mixed $value): self
    {
        $this->ensureMutable('set');

        $clone = clone $this;
        $clone->collection->set($key, $value);

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     */
    protected function setIf(mixed $key, mixed $value, \Closure $callback): self
    {
        if (!$callback($key, $value)) {
            return $this;
        }

        return $this->set($key, $value);
    }

    protected function map(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection = $this->collection->map($callback);

        return $clone;
    }

    protected function each(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection->each($callback);

        return $clone;
    }

    /**
     * @return \ArrayIterator<int|string, mixed>
     */
    public function getIterator(): \ArrayIterator
    {
        return $this->collection->getIterator();
    }

    /**
     * @return array-key[]
     */
    protected function keys(): array
    {
        return $this->collection
            ->keys()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    private function ensureMutable(string $operation): void
    {
        if ($this->collection->isReadOnly()->yes()) {
            RuntimeException::new(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation))
                ->throw()
            ;
        }
    }
}
