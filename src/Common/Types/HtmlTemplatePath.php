<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types;

use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents an HTML template path.
 */
final class HtmlTemplatePath
{
    use StringTypeTrait;

    public static function empty(): self
    {
        return new self(StringType::of(''));
    }

    public function isEmpty(): BoolEnum
    {
        return $this->value->equalsTo('');
    }
}
