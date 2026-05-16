<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

/**
 * Interface ReverseInterface.
 */
interface ReverseInterface
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse(): self;
}
