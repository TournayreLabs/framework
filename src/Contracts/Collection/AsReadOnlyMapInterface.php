<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface AsReadOnlyMapInterface
{
    /**
     * @param array<string, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asReadOnlyMap(array $collection): self;
}
