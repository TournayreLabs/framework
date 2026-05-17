<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface JsonSerializeInterface.
 */
interface JsonSerializeInterface
{
    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize();
}
