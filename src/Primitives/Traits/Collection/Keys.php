<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\KeysInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Mixed_;

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
            ->filterWith(static fn (mixed $key): bool => Mixed_::of($key)->is()->int()->isTrue() || Mixed_::of($key)->is()->string()->isTrue())
            ->each(static function (mixed $key) use (&$keys): void {
                /** @var array-key $key */
                $keys[] = $key;
            })
        ;

        return $keys;
    }
}
