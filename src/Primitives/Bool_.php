<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;
use function Symfony\Component\String\u;

/**
 * Immutable boolean value object with conversion and assertion helpers.
 *
 * Use fromBool() as entry point and asTrue()/asFalse() for explicit factories.
 */
final class Bool_
{
    private const TRUE = 'true';

    private const FALSE = 'false';

    private ?LoggerInterface $logger = null;

    private function __construct(
        private readonly string $value,
    ) {
    }

    public static function fromBool(bool $value): self
    {
        return $value ? self::true() : self::false();
    }

    /**
     * @api
     */
    public static function asTrue(): self
    {
        return self::true();
    }

    /**
     * @api
     */
    public static function asFalse(): self
    {
        return self::false();
    }

    /**
     * @api
     */
    public function withLogger(LoggerInterface $logger): self
    {
        $clone = clone $this;
        $clone->logger = $logger;

        return $clone;
    }

    /**
     * @api
     */
    public function asString(): string
    {
        return u($this->value)->lower()->toString();
    }

    /**
     * @api
     */
    public function asInt(): int
    {
        return self::TRUE === $this->value ? 1 : 0;
    }

    /**
     * @api
     */
    public function asBool(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    public function isTrue(): bool
    {
        return self::TRUE === $this->value;
    }

    /**
     * @api
     */
    public function isFalse(): bool
    {
        return self::FALSE === $this->value;
    }

    /**
     * @api
     */
    public function yes(): bool
    {
        return $this->isTrue();
    }

    /**
     * @api
     */
    public function no(): bool
    {
        return $this->isFalse();
    }

    private static function true(): self
    {
        return new self(self::TRUE);
    }

    private static function false(): self
    {
        return new self(self::FALSE);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function throwIfFalse(string|\Exception $message): void
    {
        if ($this->isTrue()) {
            return;
        }

        $this->throw($message);
    }

    /**
     * @throws ThrowableInterface
     */
    private function throw(string|\Exception $message): void
    {
        if (Mixed_::of($message)->is()->string()->isTrue()) {
            $invalidArgumentException = InvalidArgumentException::new($message);
        } else {
            $invalidArgumentException = InvalidArgumentException::new($message->getMessage())->withPrevious($message);
        }

        $this->logger?->exception($invalidArgumentException);

        $invalidArgumentException->throw();
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function throwIfTrue(string|\Exception $message): void
    {
        if ($this->isFalse()) {
            return;
        }

        $this->throw($message);
    }
}
