<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO\Context;

use TournayreLabs\Common\Model\DefaultUser;
use TournayreLabs\Contracts\Context\ContextInterface;
use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Contracts\Security\UserInterface;
use TournayreLabs\Null\NullTrait;
use TournayreLabs\Primitives\DateTime;

/**
 * Carries request context data as an immutable value object.
 *
 * Use create() for normal instances and asNull() for the null-object variant.
 */
final class Context implements ContextInterface, LoggableInterface
{
    use NullTrait;

    private function __construct(
        private readonly UserInterface $user,
        private readonly DateTimeInterface $createdAt,
    ) {
    }

    public static function asNull(): self
    {
        return (new self(DefaultUser::asNull(), DateTime::asNull()))
            ->toNullable()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public static function create(UserInterface $user, \DateTimeInterface $createdAt): self
    {
        return new self($user, DateTime::of($createdAt));
    }

    public function user(): UserInterface
    {
        return $this->user;
    }

    public function createdAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array
    {
        return [
            'user' => $this->user->identifier(),
            'createdAt' => $this->createdAt->toDateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
