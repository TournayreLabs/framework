<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

final readonly class Mixed_
{
    private function __construct(
        private mixed $value,
    ) {
    }

    /**
     * @api
     */
    public static function of(mixed $value): self
    {
        return new self($value);
    }

    /**
     * @api
     */
    public function get(): mixed
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function is(): MixedIs
    {
        return MixedIs::of($this->value);
    }

    /**
     * @api
     */
    public function as(): MixedAs
    {
        return MixedAs::of($this->value);
    }
}
