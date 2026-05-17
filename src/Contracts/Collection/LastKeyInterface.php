<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface LastKeyInterface.
 */
interface LastKeyInterface
{
    /**
     * Returns the last key.
     *
     * @throws ThrowableInterface
     *
     * @return mixed Last key of map or NULL if empty
     *
     * @api
     */
    public function lastKey();
}
