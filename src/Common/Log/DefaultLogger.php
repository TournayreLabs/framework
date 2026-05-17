<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Log;

use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * Logger implementation that forwards messages to a PSR logger with a prefix.
 *
 * The prefix uses the current identifier to keep log entries contextual.
 */
final class DefaultLogger extends AbstractLogger implements LoggerInterface
{
    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function exception(\Throwable $exception, array $context = []): void
    {
        $context['exception'] = $exception;
        $context['trace'] = $exception->getTrace();

        $this->logger->error($exception->getMessage(), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function error($message, array $context = []): void
    {
        $this->logger->error($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function alert($message, array $context = []): void
    {
        $this->logger->alert($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function critical($message, array $context = []): void
    {
        $this->logger->critical($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function notice($message, array $context = []): void
    {
        $this->logger->notice($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function info($message, array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function debug($message, array $context = []): void
    {
        $this->logger->debug($this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param \Stringable|string $message
     */
    public function log($level, $message, array $context = []): void
    {
        $this->logger->log($level, $this->prefixMessage($this->loggerIdentifier(), $message), $context);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function start(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->loggerIdentifier(), 'start'), $context);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function end(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->loggerIdentifier(), 'end'), $context);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function success(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->loggerIdentifier(), 'success'), $context);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $context
     */
    public function failFast(array $context = []): void
    {
        $this->logger->info($this->prefixMessage($this->loggerIdentifier(), 'fail fast'), $context);
    }
}
