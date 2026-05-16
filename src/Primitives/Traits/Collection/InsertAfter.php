<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\MutableException;
use TournayreLabs\Contracts\Collection\InsertAfterInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertAfter.
 *
 * @see InsertAfterInterface
 */
trait InsertAfter
{
    /**
     * Inserts the value after the given element.
     *
     * @param mixed|null $element Element to insert after
     * @param mixed|null $value   Value to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAfter($element, $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertAfter = $this->collection->insertAfter($element, $value);

        return self::of($insertAfter);
    }
}
