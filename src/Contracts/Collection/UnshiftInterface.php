<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface UnshiftInterface.
 */
interface UnshiftInterface
{
    /**
     * Adds an element at the beginning.
     *
     * @param mixed $value Item to add at the beginning
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshift(mixed $value): self;

    /**
     * Adds an element at the beginning with a key.
     *
     * @param mixed $value Item to add at the beginning
     * @param mixed $key   Key for the item
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshiftWithKey(mixed $value, mixed $key): self;
}
