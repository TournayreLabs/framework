<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\JsonSerializeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

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
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function jsonSerialize()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
