<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface IfAnyInterface.
 */
interface IfAnyInterface
{
    /**
     * Executes a callback if the map contains elements.
     *
     * @api
     */
    public function ifAny(\Closure $then): self;

    /**
     * Executes a then or else callback depending on whether the map contains elements.
     *
     * @api
     */
    public function ifAnyOrElse(\Closure $then, \Closure $else): self;
}
