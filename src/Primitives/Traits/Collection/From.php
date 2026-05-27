<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Contracts\Collection\FromInterface;
use TournayreLabs\Primitives\Mixed_;

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
        if (Mixed_::of($elements)->is()->instanceOf(static::class)->isTrue()) {
            return $elements;
        }

        if (Mixed_::of($elements)->is()->instanceOf(AimeosMap::class)->isTrue()) {
            return self::of($elements);
        }

        return self::of(AimeosMap::from($elements));
    }
}
