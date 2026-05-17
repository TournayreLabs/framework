<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Security;

use TournayreLabs\Contracts\Null\NullableInterface;

interface UserInterface extends NullableInterface
{
    public function getRoles();

    public function getPassword();

    public function getSalt();

    public function getUsername();

    public function eraseCredentials();

    public function identifier(): string;
}
