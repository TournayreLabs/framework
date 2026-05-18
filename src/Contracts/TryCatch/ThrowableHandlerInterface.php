<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\TryCatch;

/**
 * Interface ThrowableHandlerInterface.
 *
 * Defines the contract for handling throwables.
 *
 * @template-covariant T
 */
interface ThrowableHandlerInterface
{
    /**
     * Checks if the handler can handle the given throwable.
     */
    public function canHandle(\Throwable $throwable): bool;

    /**
     * Handles the given throwable.
     *
     * @return T The result of handling the throwable
     */
    public function handle(\Throwable $throwable): mixed;
}
