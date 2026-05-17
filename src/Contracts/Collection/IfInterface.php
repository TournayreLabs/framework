<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface IfInterface.
 */
interface IfInterface
{
    /**
     * Executes a callback depending on the condition.
     *
     * @param \Closure|bool $condition Boolean or function with (map) parameter returning a boolean
     * @param \Closure      $then      Function with (map, condition) parameter
     *
     * @api
     */
    public function if(\Closure|bool $condition, \Closure $then): self;

    /**
     * Executes a then or else callback depending on the condition.
     *
     * @param \Closure|bool $condition Boolean or function with (map) parameter returning a boolean
     * @param \Closure      $then      Function with (map, condition) parameter
     * @param \Closure      $else      Function with (map, condition) parameter
     *
     * @api
     */
    public function ifOrElse(\Closure|bool $condition, \Closure $then, \Closure $else): self;
}
