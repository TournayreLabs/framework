<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final readonly class MixedAs
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
     *
     * @throws ThrowableInterface
     */
    public function string(): String_
    {
        $value = $this->value;
        if (!is_string($value)) {
            throw InvalidArgumentException::new(sprintf('Cannot cast %s to string', get_debug_type($value)));
        }

        return String_::fromString($value);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function int(): Int_
    {
        $value = $this->value;
        if (!is_int($value)) {
            throw InvalidArgumentException::new(sprintf('Cannot cast %s to int', get_debug_type($value)));
        }

        return Int_::of($value);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function numeric(): Numeric
    {
        $value = $this->value;
        if (!is_float($value)) {
            throw InvalidArgumentException::new(sprintf('Cannot cast %s to float', get_debug_type($value)));
        }

        return Numeric::fromFloat($value);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function bool(): Bool_
    {
        $value = $this->value;
        if (!is_bool($value)) {
            throw InvalidArgumentException::new(sprintf('Cannot cast %s to bool', get_debug_type($value)));
        }

        return Bool_::fromBool($value);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function array(): Collection
    {
        $value = $this->value;
        if (!is_array($value)) {
            throw InvalidArgumentException::new(sprintf('Cannot cast %s to array', get_debug_type($value)));
        }

        return Collection::of($value);
    }
}
