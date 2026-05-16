<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\LtrimInterface;

/**
 * Trait Ltrim.
 *
 * @see LtrimInterface
 */
trait Ltrim
{
    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    public function ltrim(string $chars = " \n\r\t\v\x00"): self
    {
        $ltrim = $this->collection->ltrim($chars);

        return self::of($ltrim);
    }
}
