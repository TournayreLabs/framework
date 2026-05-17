<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types\File;

use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Stores a file extension value as an immutable string type.
 *
 * Use this object to avoid passing raw extension literals around.
 */
final class Extension
{
    use StringTypeTrait;
}
