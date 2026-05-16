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
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function from();
}
