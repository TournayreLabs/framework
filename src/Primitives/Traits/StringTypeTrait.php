<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\String_;

/**
 * Provides String_ primitive delegation for string-based value objects.
 */
trait StringTypeTrait
{
    private function __construct(
        protected String_ $value,
    ) {
    }

    public static function of(string $value): self
    {
        return new self(String_::fromString($value));
    }

    public function toString(): string
    {
        return $this->value->toString();
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @param string|self $value
     */
    public function equalsTo($value): Bool_
    {
        $valueToCheck = $value instanceof self ? $value->toString() : $value;

        return $this->value->equalsTo($valueToCheck);
    }
}
