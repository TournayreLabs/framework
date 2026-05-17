<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Contracts\Collection\FromInterface;

/**
 * Trait From.
 *
 * @see FromInterface
 */
trait From
{
    /**
     * Creates a new map from passed elements.
     *
     * @api
     */
    public static function from(mixed $elements = []): self
    {
        if ($elements instanceof self) {
            return $elements;
        }

        if ($elements instanceof AimeosMap) {
            return self::of($elements);
        }

        return self::of(AimeosMap::from($elements));
    }
}
