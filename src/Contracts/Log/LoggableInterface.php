<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Log;

interface LoggableInterface
{
    // @phpstan-ignore-next-line
    public function toLog(): array;
}
