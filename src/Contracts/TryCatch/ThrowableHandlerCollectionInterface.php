<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\TryCatch;

use TournayreLabs\Contracts\Collection\AddInterface;

/**
 * Interface ThrowableHandlerCollectionInterface.
 *
 * Defines the contract for a collection of throwable handlers.
 */
interface ThrowableHandlerCollectionInterface extends AddInterface
{
    /**
     * Finds a handler that can handle the given throwable.
     *
     * @return ThrowableHandlerInterface<mixed>|null
     */
    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface;
}
