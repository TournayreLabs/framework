<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface FirstKeyInterface.
 */
interface FirstKeyInterface
{
    /**
     * Returns the first key.
     *
     * @throws ThrowableInterface
     *
     * @return mixed First key of map or NULL if empty
     *
     * @api
     */
    public function firstKey();
}
