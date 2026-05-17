<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\IsScalarInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait IsScalar.
 *
 * @see IsScalarInterface
 */
trait IsScalar
{
    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    public function isScalar(): Bool_
    {
        $isScalar = $this->collection->isScalar();

        return Bool_::fromBool($isScalar);
    }
}
