<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\JsonSerializeInterface;

/**
 * Trait JsonSerialize.
 *
 * @see JsonSerializeInterface
 */
trait JsonSerialize
{
    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @return mixed
     *
     * @api
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->collection->jsonSerialize();
    }
}
