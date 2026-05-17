<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types\File;

use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Stores a filename value as an immutable string type.
 *
 * Use this object when an API expects a filename semantic.
 */
final class Filename
{
    use StringTypeTrait;
}
