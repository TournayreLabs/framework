<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\StrContainsInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait StrContains.
 *
 * @see StrContainsInterface
 */
trait StrContains
{
    /**
     * Tests if at least one of the passed strings is part of at least one entry.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContains(mixed $value, string $encoding = 'UTF-8'): Bool_
    {
        if (!\is_string($value) && !\is_array($value)) {
            return Bool_::asFalse();
        }

        $strContains = $this->collection->strContains($value, $encoding);

        return Bool_::fromBool($strContains);
    }
}
