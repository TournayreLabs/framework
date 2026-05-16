<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Contracts\Collection\ToUrlInterface;

/**
 * Trait ToUrl.
 *
 * @see ToUrlInterface
 */
trait ToUrl
{
    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string
    {
        return $this->collection->toUrl();
    }
}
