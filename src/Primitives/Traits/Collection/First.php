<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\FirstInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait First.
 *
 * @see FirstInterface
 */
trait First
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function first(): mixed
    {
        try {
            return $this->collection->first();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
