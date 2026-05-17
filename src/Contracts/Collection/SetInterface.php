<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface SetInterface.
 */
interface SetInterface
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set(mixed $key, mixed $value): void;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function setWithCallback(mixed $key, mixed $value, \Closure $callback): void;
}
