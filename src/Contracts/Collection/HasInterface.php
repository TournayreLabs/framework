<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Primitives\BoolEnum;

/**
 * Interface HasInterface.
 */
interface HasInterface
{
    /**
     * Tests if a key exists.
     *
     * @param array<int|string>|int|string $key Key of the requested item or list of keys
     *
     * @api
     */
    public function has($key): BoolEnum;
}
