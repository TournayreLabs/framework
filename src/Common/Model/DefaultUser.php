<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Model;

use TournayreLabs\Null\NullTrait;

/**
 * Null-object user implementation used when no authenticated user is available.
 *
 * All credential and identity accessors return empty values.
 */
final class DefaultUser extends AbstractUser
{
    use NullTrait;

    /** @return array<string> */
    public function getRoles(): array
    {
        return [];
    }

    public function getPassword(): string
    {
        return '';
    }

    public function getSalt(): string
    {
        return '';
    }

    public function getUsername(): string
    {
        return '';
    }

    public function identifier(): string
    {
        return '';
    }

    public static function asNull(): self
    {
        return (new self())
            ->toNullable()
        ;
    }
}
