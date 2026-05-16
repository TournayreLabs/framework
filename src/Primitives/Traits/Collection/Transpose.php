<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\TransposeInterface;

/**
 * Trait Transpose.
 *
 * @see TransposeInterface
 */
trait Transpose
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self
    {
        $transpose = $this->collection->transpose();

        return self::of($transpose);
    }
}
