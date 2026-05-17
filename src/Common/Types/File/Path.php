<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types\File;

use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Stores a filesystem path value as an immutable string type.
 *
 * Use this object for path arguments that are not generic strings.
 */
final class Path
{
    use StringTypeTrait;
}
