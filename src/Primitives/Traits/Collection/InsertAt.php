<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\InsertAtInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertAt.
 *
 * @see InsertAtInterface
 */
trait InsertAt
{
    /**
     * Inserts the element at the given position in the map.
     *
     * @param int   $pos     Position the element it should be inserted at
     * @param mixed $element Element to be inserted
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAt(int $pos, mixed $element): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertAt = $this->collection->insertAt($pos, $element);

        return self::of($insertAt);
    }

    /**
     * Inserts the element at the given position in the map with a key.
     *
     * @param int   $pos     Position the element it should be inserted at
     * @param mixed $element Element to be inserted
     * @param mixed $key     Element key
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAtWithKey(int $pos, mixed $element, mixed $key): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertAt = $this->collection->insertAt($pos, $element, $key);

        return self::of($insertAt);
    }
}
