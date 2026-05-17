<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface InsertAtInterface.
 */
interface InsertAtInterface
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
    public function insertAt(int $pos, mixed $element): self;

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
    public function insertAtWithKey(int $pos, mixed $element, mixed $key): self;
}
