<?php

declare(strict_types=1);

namespace TournayreLabs\Null;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Mixed_;

/**
 * Adds null-object behavior to value objects through a NullEnum flag.
 *
 * It provides helpers for nullability checks and fail-fast null handling.
 */
trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        if ('__construct' === $name) {
            $this->initializeNull();
        }

        return null;
    }

    private function initializeNull(?bool $isNull = null): void
    {
        $this->null = NullEnum::fromBool($isNull ?? false);
    }

    /**
     * @api
     */
    public function toNullable(): self
    {
        $clone = clone $this;
        $clone->null = NullEnum::yes();

        return $clone;
    }

    /**
     * @api
     */
    public function isNull(): bool
    {
        return $this->null->isNull();
    }

    /**
     * @api
     */
    public function isNotNull(): bool
    {
        return $this->null->isNotNull();
    }

    /**
     * @api
     */
    public static function asNull(): self
    {
        $self = new self();
        $self->null = NullEnum::yes();

        return $self;
    }

    /**
     * @api
     */
    public function orNull(): self
    {
        if ($this->null->isNull()) {
            return $this::asNull();
        }

        return $this;
    }

    /**
     * @param \Throwable|callable():mixed $throwable
     *
     * @throws ThrowableInterface
     * @throws \Throwable
     *
     * @api
     */
    public function orThrow(\Throwable|callable $throwable): self
    {
        if ($this->null->isNotNull()) {
            return $this;
        }

        if (Mixed_::of($throwable)->is()->instanceOf(\Throwable::class)->isTrue()) {
            RuntimeException::fromThrowable($throwable)->throw();
        }

        if (Mixed_::of($throwable)->is()->callable()->isFalse()) {
            throw RuntimeException::new('Throwable callback is not callable.');
        }

        /** @var callable():mixed $throwable */
        $generatedThrowable = $throwable();
        if (Mixed_::of($generatedThrowable)->is()->instanceOf(\Throwable::class)->isFalse()) {
            throw RuntimeException::new('Throwable callback must return a Throwable.');
        }

        throw $generatedThrowable;
    }
}
