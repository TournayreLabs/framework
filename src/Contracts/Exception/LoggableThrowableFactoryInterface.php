<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Exception;

use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * Factory contract for framework throwables that need a logger at creation time.
 */
interface LoggableThrowableFactoryInterface
{
    /**
     * Creates a new instance of the throwable.
     *
     * @param array<array-key, mixed> $context
     *
     * @return ThrowableInterface The new throwable instance
     */
    public static function new(LoggerInterface $logger, string $message = '', int $code = 0, array $context = []): ThrowableInterface;

    /**
     * Creates a new instance from an existing throwable.
     *
     * @param array<array-key, mixed> $context
     *
     * @return ThrowableInterface The new throwable instance
     */
    public static function fromThrowable(LoggerInterface $logger, \Throwable $throwable, array $context = []): ThrowableInterface;
}
