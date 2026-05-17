<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface LastInterface.
 */
interface LastInterface
{
    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function last(): mixed;
}
