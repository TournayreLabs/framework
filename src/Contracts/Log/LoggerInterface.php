<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Log;

interface LoggerInterface extends \Psr\Log\LoggerInterface
{
    public function identifiedAs(string $identifier): void;

    public function resetIdentifier(): void;

    /**
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void;

    /**
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void;

    /** @param array<string, mixed> $context */
    public function exception(\Throwable $exception, array $context = []): void;

    /** @param array<string, mixed> $context */
    public function start(array $context = []): void;

    /** @param array<string, mixed> $context */
    public function end(array $context = []): void;

    /** @param array<string, mixed> $context */
    public function success(array $context = []): void;

    /** @param array<string, mixed> $context */
    public function failFast(array $context = []): void;
}
