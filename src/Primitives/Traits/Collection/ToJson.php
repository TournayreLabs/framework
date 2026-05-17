<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\ToJsonInterface;

/**
 * Trait ToJson.
 *
 * @see ToJsonInterface
 */
trait ToJson
{
    /**
     * Returns the elements in JSON format.
     *
     * @throws \TournayreLabs\Contracts\Exception\ThrowableInterface
     *
     * @api
     */
    public function toJson(int $options = 0): string
    {
        $result = $this->collection->toJson($options);

        if (null === $result) {
            throw RuntimeException::new('JSON encoding failed');
        }

        return $result;
    }
}
