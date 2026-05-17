<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Model;

use TournayreLabs\Common\VO\Security\PlainPassword;
use TournayreLabs\Contracts\Security\UserInterface;

/**
 * Base user model contract implementation shared by framework user objects.
 *
 * Implementations provide identity and credential access methods required by security adapters.
 */
abstract class AbstractUser implements UserInterface
{
    protected PlainPassword $plainPassword;

    /** @return array<string> */
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
