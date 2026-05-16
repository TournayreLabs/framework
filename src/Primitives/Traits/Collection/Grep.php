<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\GrepInterface;

/**
 * Trait Grep.
 *
 * @see GrepInterface
 */
trait Grep
{
    /**
     * Applies a regular expression to all elements.
     *
     * @api
     */
    public function grep(string $pattern, int $flags = 0): self
    {
        $grep = $this->collection->grep($pattern, $flags);

        return self::of($grep);
    }
}
