<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ValuesInterface;

/**
 * Trait Values.
 *
 * @see ValuesInterface
 */
trait Values
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    public function values(): self
    {
        $values = $this->collection->values();

        return self::of($values);
    }
}
