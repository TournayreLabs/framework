<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

final readonly class MixedIs
{
    private function __construct(
        private mixed $value,
    ) {
    }

    public static function of(mixed $value): self
    {
        return new self($value);
    }

    /**
     * @api
     */
    public function string(): Bool_
    {
        return Bool_::fromBool(is_string($this->value));
    }

    /**
     * @api
     */
    public function int(): Bool_
    {
        return Bool_::fromBool(is_int($this->value));
    }

    /**
     * @api
     */
    public function float(): Bool_
    {
        return Bool_::fromBool(is_float($this->value));
    }

    /**
     * @api
     */
    public function bool(): Bool_
    {
        return Bool_::fromBool(is_bool($this->value));
    }

    /**
     * @api
     */
    public function array(): Bool_
    {
        return Bool_::fromBool(is_array($this->value));
    }

    /**
     * @api
     */
    public function null(): Bool_
    {
        return Bool_::fromBool(null === $this->value);
    }

    /**
     * @api
     */
    public function object(): Bool_
    {
        return Bool_::fromBool(is_object($this->value));
    }

    /**
     * @api
     */
    public function numeric(): Bool_
    {
        return Bool_::fromBool(is_numeric($this->value));
    }

    /**
     * @api
     */
    public function scalar(): Bool_
    {
        return Bool_::fromBool(is_scalar($this->value));
    }

    /**
     * @api
     */
    public function callable(): Bool_
    {
        return Bool_::fromBool(is_callable($this->value));
    }

    /**
     * @api
     */
    public function instanceOf(string $class): Bool_
    {
        return Bool_::fromBool($this->value instanceof $class);
    }
}
