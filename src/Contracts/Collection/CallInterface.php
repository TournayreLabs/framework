<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface CallInterface.
 */
interface CallInterface
{
    /**
     * Calls the given method on all items.
     *
     * @param array<int, mixed> $params
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function call(string $name, array $params = []): self;
}
