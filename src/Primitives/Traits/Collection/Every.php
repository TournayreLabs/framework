<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\EveryInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait Every.
 *
 * @see EveryInterface
 */
trait Every
{
    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    public function every(\Closure $callback): Bool_
    {
        $every = $this->collection->every($callback);

        return Bool_::fromBool($every);
    }
}
