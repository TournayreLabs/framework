<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Log;

use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * No-op logger implementation used when logging must be disabled.
 *
 * All methods accept the standard logger inputs and intentionally perform no side effects.
 */
final class NullLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function exception(\Throwable $exception, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function start(array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function end(array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function success(array $context = []): void
    {
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function failFast(array $context = []): void
    {
    }
}
