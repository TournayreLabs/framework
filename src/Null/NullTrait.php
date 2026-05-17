<?php

declare(strict_types=1);

namespace TournayreLabs\Null;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Common\Model\DefaultUser;
use TournayreLabs\Common\VO\Context\Context;
use TournayreLabs\Common\VO\Security\PlainPassword;
use TournayreLabs\Component\Mailer\Types\EmailHtml;
use TournayreLabs\Component\Mailer\Types\EmailSubject;
use TournayreLabs\Component\Mailer\Types\EmailText;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\DateTime;
use TournayreLabs\Tests\Fixtures\Title;

trait NullTrait
{
    protected NullEnum $null;

    /**
     * @param array<int, mixed> $arguments
     */
    // @phpstan-ignore-next-line
    public function __call(string $name, array $arguments)
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
     * @api
     */
    public function orThrow(\Throwable|callable $throwable): self
    {
        if ($this->null->isNotNull()) {
            return $this;
        }

        if ($throwable instanceof \Throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }

        if (!is_callable($throwable)) {
            throw RuntimeException::new('Throwable callback is not callable.');
        }

        /** @var callable():mixed $throwable */
        $generatedThrowable = $throwable();
        if (!$generatedThrowable instanceof \Throwable) {
            throw RuntimeException::new('Throwable callback must return a Throwable.');
        }

        throw $generatedThrowable;
    }
}
