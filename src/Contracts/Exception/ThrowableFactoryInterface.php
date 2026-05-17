<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Exception;

/**
 * Factory contract for regular framework throwables.
 */
interface ThrowableFactoryInterface
{
    /**
     * Creates a new instance of the throwable.
     *
     * @param string $message The exception message
     * @param int    $code    The exception code
     *
     * @return ThrowableInterface The new throwable instance
     */
    public static function new(string $message = '', int $code = 0): ThrowableInterface;

    /**
     * Creates a new instance from an existing throwable.
     *
     * @param \Throwable $throwable The original throwable to convert
     *
     * @return ThrowableInterface The new throwable instance
     */
    // @phpstan-ignore-next-line
    public static function fromThrowable(\Throwable $throwable): ThrowableInterface;
}
