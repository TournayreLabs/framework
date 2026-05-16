<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface AsReadOnlyListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asReadOnlyList(array $collection): self;
}
