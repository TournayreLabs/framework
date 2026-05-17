<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\TraverseInterface;

/**
 * Trait Traverse.
 *
 * @see TraverseInterface
 */
trait Traverse
{
    /**
     * Traverses trees of nested items.
     *
     * @param string $nestKey Key to the children of each item
     *
     * @api
     */
    public function traverse(string $nestKey = 'children'): self
    {
        $traverse = $this->collection->traverse(null, $nestKey);

        return self::of($traverse);
    }

    /**
     * Traverses trees of nested items passing each item to the callback.
     *
     * @param \Closure $callback Callback with (entry, key, level, $parent) arguments, returns the entry added to result
     * @param string   $nestKey  Key to the children of each item
     *
     * @api
     */
    public function traverseWith(\Closure $callback, string $nestKey = 'children'): self
    {
        $traverse = $this->collection->traverse($callback, $nestKey);

        return self::of($traverse);
    }
}
