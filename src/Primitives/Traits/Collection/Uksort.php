<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\UksortInterface;

/**
 * Trait Uksort.
 *
 * @see UksortInterface
 */
trait Uksort
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort(callable $callback): self
    {
        $uksort = $this->collection->uksort($callback);

        return self::of($uksort);
    }
}
