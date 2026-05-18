<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\KeysInterface;
use TournayreLabs\Primitives\Collection;

/**
 * Trait Keys.
 *
 * @see KeysInterface
 */
trait Keys
{
    /**
     * Returns all keys.
     *
     * @api
     *
     * @return array-key[]
     */
    public function keys(): array
    {
        $keys = [];
        Collection::of($this->collection->keys()->toArray())
            ->filterWith(static fn (mixed $key): bool => \is_int($key) || \is_string($key))
            ->each(static function (mixed $key) use (&$keys): void {
                /** @var array-key $key */
                $keys[] = $key;
            })
        ;

        return $keys;
    }
}
