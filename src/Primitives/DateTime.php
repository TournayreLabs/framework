<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Primitives\Traits\DateTimeTrait;

final class DateTime implements DateTimeInterface
{
    use DateTimeTrait;
}
