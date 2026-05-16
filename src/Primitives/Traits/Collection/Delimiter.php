<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits\Collection;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Collection\DelimiterInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Trait Delimiter.
 *
 * @see DelimiterInterface
 */
trait Delimiter
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function delimiter()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
