<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Context;

use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Contracts\Security\UserInterface;

interface ContextInterface extends NullableInterface
{
    public function user(): UserInterface;

    public function createdAt(): DateTimeInterface;

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array;
}
