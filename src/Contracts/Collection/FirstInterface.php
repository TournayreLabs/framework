<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface FirstInterface.
 */
interface FirstInterface
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function first(): mixed;
}
