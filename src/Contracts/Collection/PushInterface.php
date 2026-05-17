<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface PushInterface.
 */
interface PushInterface
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function push(mixed $value): self;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pushWithCallback(mixed $value, \Closure $callback): self;
}
