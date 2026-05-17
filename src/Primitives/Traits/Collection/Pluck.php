<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\PluckInterface;

/**
 * Trait Pluck.
 *
 * @see PluckInterface
 */
trait Pluck
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck(): self
    {
        $pluck = $this->collection->pluck();

        return self::of($pluck);
    }

    /**
     * Creates a key/value mapping using the given value column.
     *
     * @api
     */
    public function pluckBy(string $valuecol): self
    {
        $pluck = $this->collection->pluck($valuecol);

        return self::of($pluck);
    }

    /**
     * Creates a key/value mapping using the given value and index columns.
     *
     * @api
     */
    public function pluckByBoth(string $valuecol, string $indexcol): self
    {
        $pluck = $this->collection->pluck($valuecol, $indexcol);

        return self::of($pluck);
    }
}
