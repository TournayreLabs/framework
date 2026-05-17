<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface FromJsonInterface.
 */
interface FromJsonInterface
{
    /**
     * Creates a new map from a JSON string.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function fromJson(string $json, int $options = JSON_BIGINT_AS_STRING): self;
}
