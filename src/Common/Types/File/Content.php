<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types\File;

use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

final class Content
{
    use StringTypeTrait;

    /**
     * @api
     */
    public function containsAny(string $needle): BoolEnum
    {
        return $this->value->containsAny($needle);
    }
}
