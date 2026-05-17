<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\StrEndsAllInterface;
use TournayreLabs\Primitives\Bool_;

/**
 * Trait StrEndsAll.
 *
 * @see StrEndsAllInterface
 */
trait StrEndsAll
{
    /**
     * Tests if all of the entries ends with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strEndsAll($value, string $encoding = 'UTF-8'): Bool_
    {
        $strEndsAll = $this->collection->strEndsAll($value, $encoding);

        return Bool_::fromBool($strEndsAll);
    }
}
