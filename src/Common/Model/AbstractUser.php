<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Model;

use TournayreLabs\Common\VO\Security\PlainPassword;
use TournayreLabs\Contracts\Security\UserInterface;

abstract class AbstractUser implements UserInterface
{
    protected PlainPassword $plainPassword;

    // @phpstan-ignore-next-line
    abstract public function getRoles(): array;

    abstract public function getPassword(): string;

    abstract public function getSalt(): string;

    abstract public function getUsername(): string;

    abstract public function identifier(): string;

    public function eraseCredentials(): void
    {
        $this->plainPassword = PlainPassword::asNull();
    }
}
