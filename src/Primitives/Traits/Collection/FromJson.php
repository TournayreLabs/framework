<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\FromJsonInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait FromJson.
 *
 * @see FromJsonInterface
 */
trait FromJson
{
    /**
     * Creates a new map from a JSON string.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function fromJson()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
