<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Primitives\Traits\DateTimeTrait;

/**
 * DateTime primitive implementing framework date and time operations.
 *
 * It delegates behavior to DateTimeTrait while keeping an immutable API.
 */
final class DateTime implements DateTimeInterface
{
    use DateTimeTrait;
}
