<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\StrUpperInterface;

/**
 * Trait StrUpper.
 *
 * @see StrUpperInterface
 */
trait StrUpper
{
    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    public function strUpper(string $encoding = 'UTF-8'): self
    {
        $strUpper = $this->collection->strUpper($encoding);

        return self::of($strUpper);
    }
}
