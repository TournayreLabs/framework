<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Security;

interface SecurityInterface
{
    public function user(): UserInterface;
}
