<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface PadInterface.
 */
interface PadInterface
{
    /**
     * Fill up to the specified length with null values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pad(int $size): self;

    /**
     * Fill up to the specified length with the given value.
     *
     * @param mixed $value Value to fill up with if the map length is smaller than the given size
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function padWith(int $size, mixed $value): self;
}
