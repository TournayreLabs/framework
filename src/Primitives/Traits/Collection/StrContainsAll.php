<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\StrContainsAllInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Mixed_;

/**
 * Trait StrContainsAll.
 *
 * @see StrContainsAllInterface
 */
trait StrContainsAll
{
    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContainsAll(mixed $value, string $encoding = 'UTF-8'): Bool_
    {
        if (Mixed_::of($value)->is()->string()->isTrue() || Mixed_::of($value)->is()->array()->isTrue()) {
            $strContainsAll = $this->collection->strContainsAll($value, $encoding);

            return Bool_::fromBool($strContainsAll);
        }

        return Bool_::asFalse();
    }
}
