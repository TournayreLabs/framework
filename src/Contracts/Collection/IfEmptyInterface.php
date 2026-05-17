<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Interface IfEmptyInterface.
 */
interface IfEmptyInterface
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function ifEmpty(?\Closure $then = null, ?\Closure $else = null): self;
}
