<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\InsertBeforeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertBefore.
 *
 * @see InsertBeforeInterface
 */
trait InsertBefore
{
    /**
     * Inserts the value before the given element.
     *
     * @param mixed $element Element before the value is inserted
     * @param mixed $value   Element or list of elements to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertBefore(mixed $element, mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertBefore = $this->collection->insertBefore($element, $value);

        return self::of($insertBefore);
    }
}
