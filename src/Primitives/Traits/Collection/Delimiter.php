<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Contracts\Collection\DelimiterInterface;

/**
 * Trait Delimiter.
 *
 * @see DelimiterInterface
 */
trait Delimiter
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @api
     */
    public static function delimiter(?string $char = null): string
    {
        return AimeosMap::delimiter($char);
    }
}
