<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface DdInterface.
 */
interface DdInterface
{
    /**
     * Prints the map content and terminates the script.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function dd(): void;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function ddWith(\Closure $callback): void;
}
