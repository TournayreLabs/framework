<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface AsListInterface
{
    /**
     * @param array<int, mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self;
}
