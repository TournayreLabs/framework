<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception\Loggable;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * Trait implementing common functionality for loggable throwable objects.
 */
trait LoggableThrowableTrait
{
    private readonly LoggerInterface $logger;

    /**
     * @var array<array-key, mixed>
     */
    private readonly array $context;

    /**
     * @param array<array-key, mixed> $context
     */
    public function __construct(LoggerInterface $logger, string $message = '', int $code = 0, ?\Throwable $previous = null, array $context = [])
    {
        $this->logger = $logger;
        $this->context = $context;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @param array<array-key, mixed> $context
     */
    public static function fromThrowable(LoggerInterface $logger, \Throwable $throwable, array $context = []): self
    {
        return self::new($logger, $throwable->getMessage(), $throwable->getCode(), $context)
            ->withPrevious($throwable)
        ;
    }

    public function withPrevious(\Throwable $previous): self
    {
        return new self($this->logger, $this->message, $this->code, $previous, $this->context);
    }

    /**
     * @param array<array-key, mixed> $context
     */
    public static function new(LoggerInterface $logger, string $message = '', int $code = 0, array $context = []): self
    {
        return new self($logger, $message, $code, null, $context);
    }

    /**
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(): void
    {
        $this->logger->exception($this, $this->context);

        throw $this;
    }
}
