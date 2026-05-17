<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents an HTML template path.
 */
final class HtmlTemplatePath
{
    use StringTypeTrait;

    public static function empty(): self
    {
        return new self(String_::fromString(''));
    }

    public function isEmpty(): Bool_
    {
        return $this->value->equalsTo('');
    }
}
