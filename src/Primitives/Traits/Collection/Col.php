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
    public function col(): self
    {
        $col = $this->collection->col();

        return self::of($col);
    }

    /**
     * Creates a key/value mapping using the given value column.
     *
     * @api
     */
    public function colBy(string $valuecol): self
    {
        $col = $this->collection->col($valuecol);

        return self::of($col);
    }

    /**
     * Creates a key/value mapping using the given value and index columns.
     *
     * @api
     */
    public function colByBoth(string $valuecol, string $indexcol): self
    {
        $col = $this->collection->col($valuecol, $indexcol);

        return self::of($col);
    }
}
