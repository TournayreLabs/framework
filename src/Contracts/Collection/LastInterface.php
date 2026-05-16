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
     * Returns the last element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function last($default = null);
}
