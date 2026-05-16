<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface AsMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self;
}
