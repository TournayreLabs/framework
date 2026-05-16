<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface InsertBeforeInterface.
 */
interface InsertBeforeInterface
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
    public function insertBefore(mixed $element, mixed $value): self;
}
