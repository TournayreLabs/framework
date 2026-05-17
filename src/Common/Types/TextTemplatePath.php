<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents a text template path.
 */
final class TextTemplatePath
{
    use StringTypeTrait;

    public static function empty(): self
    {
        return new self(StringType::of(''));
    }

    public function isEmpty(): Bool_
    {
        return $this->value->equalsTo('');
    }
}
