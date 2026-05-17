<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface FromInterface.
 */
interface FromInterface
{
    /**
     * Creates a new map from passed elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function from(mixed $elements = []): self;
}
