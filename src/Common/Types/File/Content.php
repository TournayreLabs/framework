<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types\File;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Stores file content as an immutable string wrapper.
 *
 * Provides content-focused helper operations like containsAny().
 */
final class Content
{
    use StringTypeTrait;

    /**
     * @api
     */
    public function containsAny(string $needle): Bool_
    {
        return $this->value->containsAny($needle);
    }
}
