<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
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
    public static function fromJson(string $json, int $options = JSON_BIGINT_AS_STRING): self
    {
        try {
            return self::of(AimeosMap::fromJson($json, $options));
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
