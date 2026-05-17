<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface CompareInterface.
 */
interface CompareInterface
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    public function compare(string $value, bool $case = true): Bool_;
}
