<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Add.
 *
 * @see AddInterface
 */
trait Add
{
    /**
     * Adds an element.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $newCollection = $this
            ->collection->push($value)
        ;

        return self::of($newCollection);
    }

    /**
     * Adds an element using callback.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if (!$callback($value)) {
            return $this;
        }

        $newCollection = $this
            ->collection->push($value)
        ;

        return self::of($newCollection);
    }
}
