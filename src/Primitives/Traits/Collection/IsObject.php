<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsObjectInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait IsObject.
 *
 * @see IsObjectInterface
 */
trait IsObject
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): Bool_
    {
        $isObject = $this->collection->isObject();

        return Bool_::fromBool($isObject);
    }
}
