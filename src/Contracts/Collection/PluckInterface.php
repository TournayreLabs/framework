<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface PluckInterface.
 */
interface PluckInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck(): self;

    /**
     * Creates a key/value mapping using the given value column.
     *
     * @api
     */
    public function pluckBy(string $valuecol): self;

    /**
     * Creates a key/value mapping using the given value and index columns.
     *
     * @api
     */
    public function pluckByBoth(string $valuecol, string $indexcol): self;
}
