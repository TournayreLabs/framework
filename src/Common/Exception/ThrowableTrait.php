<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * Trait implementing common functionality for throwable objects.
 *
 * This trait provides implementations for the methods required by ThrowableInterface.
 * It can be used by exception classes to avoid code duplication.
 */
trait ThrowableTrait
{
    /**
     * Creates a new instance from an existing throwable.
     *
     * @param \Throwable $throwable The original throwable to convert
     *
     * @return self The new throwable instance
     */
    public static function fromThrowable(\Throwable $throwable): self
    {
        return self::new($throwable->getMessage(), $throwable->getCode())
            ->withPrevious($throwable)
        ;
    }

    /**
     * Sets the previous throwable.
     *
     * @param \Throwable $previous The previous throwable
     *
     * @return self A new instance with the previous throwable set
     */
    public function withPrevious(\Throwable $previous): self
    {
        return new self($this->message, $this->code, $previous);
    }

    /**
     * Creates a new instance of the throwable.
     *
     * @param string $message The exception message
     * @param int    $code    The exception code
     *
     * @return self The new throwable instance
     */
    public static function new(string $message = '', int $code = 0): self
    {
        return new self($message, $code);
    }

    /**
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(): void
    {
        throw $this;
    }

    /**
     * @param array<array-key, mixed> $context
     *
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throwWith(LoggerInterface $logger, array $context = []): void
    {
        $logger->exception($this, $context);

        throw $this;
    }
}
