<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface AddInterface.
 */
interface AddInterface
{
    /**
     * Adds an element.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value): self;

    /**
     * Adds an element using callback.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self;
}
