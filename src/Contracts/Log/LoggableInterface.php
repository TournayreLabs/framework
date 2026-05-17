<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Log;

interface LoggableInterface
{
    /** @return array<mixed> */
    public function toLog(): array;
}
