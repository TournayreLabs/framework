<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\Bool_;

/**
 * Interface EveryInterface.
 */
interface EveryInterface
{
    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    public function every(\Closure $callback): Bool_;
}
