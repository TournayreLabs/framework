<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Traits;

use TournayreLabs\Primitives\Bool_;

/**
 * Provides identity comparison helpers for value objects.
 *
 * Methods return Bool_ wrappers for consistent primitive usage.
 */
trait IsTrait
{
    public function is(self $object): Bool_
    {
        $is = $this === $object;

        return Bool_::fromBool($is);
    }

    public function isNot(self $object): Bool_
    {
        $isNot = $this !== $object;

        return Bool_::fromBool($isNot);
    }
}
