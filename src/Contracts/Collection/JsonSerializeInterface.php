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
     * @return mixed
     *
     * @api
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize();
}
