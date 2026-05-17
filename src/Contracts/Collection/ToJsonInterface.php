<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface ToJsonInterface.
 */
interface ToJsonInterface
{
    /**
     * Returns the elements in JSON format.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function toJson(int $options = 0): string;
}
