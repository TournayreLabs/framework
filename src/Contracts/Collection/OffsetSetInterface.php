<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface OffsetSetInterface.
 */
interface OffsetSetInterface
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function offsetSet(int|string|null $key, mixed $value): void;
}
