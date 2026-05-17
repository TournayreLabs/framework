<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface ColInterface.
 */
interface ColInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function col(): self;

    /**
     * Creates a key/value mapping using the given value column.
     *
     * @api
     */
    public function colBy(string $valuecol): self;

    /**
     * Creates a key/value mapping using the given value and index columns.
     *
     * @api
     */
    public function colByBoth(string $valuecol, string $indexcol): self;
}
