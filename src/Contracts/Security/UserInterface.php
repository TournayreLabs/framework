<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Security;

use TournayreLabs\Contracts\Null\NullableInterface;

interface UserInterface extends NullableInterface
{
    /** @return array<string> */
    public function getRoles(): array;

    public function getPassword(): string;

    public function getSalt(): string;

    public function getUsername(): string;

    public function eraseCredentials(): void;

    public function identifier(): string;
}
