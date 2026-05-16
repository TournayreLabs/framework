<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\RekeyInterface;

/**
 * Trait Rekey.
 *
 * @see RekeyInterface
 */
trait Rekey
{
    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    public function rekey(callable $callback): self
    {
        $map = $this->collection->rekey($callback);

        return self::of($map);
    }
}
