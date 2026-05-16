<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ColInterface;

/**
 * Trait Col.
 *
 * @see ColInterface
 */
trait Col
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function col(?string $valuecol = null, ?string $indexcol = null): self
    {
        $col = $this->collection->col($valuecol, $indexcol);

        return self::of($col);
    }
}
