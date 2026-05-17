<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Locale;
use TournayreLabs\Primitives\Numeric;

/**
 * Exposes Numeric primitive operations to strongly typed numeric wrappers.
 */
trait NumericTrait
{
    private function __construct(
        protected Numeric $value,
    ) {
    }

    /**
     * @throws ThrowableInterface
     */
    public static function of(string $value): self
    {
        return new self(Numeric::of($value));
    }

    /**
     * @api
     */
    public function value(): float
    {
        return $this->value->value();
    }

    /**
     * @api
     */
    public function intValue(): int
    {
        return $this->value->intValue();
    }

    /**
     * @api
     */
    public function precision(): int
    {
        return $this->value->precision();
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function format(Locale $locale): string
    {
        return $this->value->format($locale);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return self::fromNumeric($this->value->round($mode));
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThan($numeric): Bool_
    {
        return $this->value->greaterThan($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThanOrEqual($numeric): Bool_
    {
        return $this->value->greaterThanOrEqual($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThan($numeric): Bool_
    {
        return $this->value->lessThan($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThanOrEqual($numeric): Bool_
    {
        return $this->value->lessThanOrEqual($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function equalTo($numeric): Bool_
    {
        return $this->value->equalTo($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function notEqualTo($numeric): Bool_
    {
        return $this->value->notEqualTo($numeric);
    }

    /**
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function between($min, $max): Bool_
    {
        return $this->value->between($min, $max);
    }

    /**
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function betweenOrEqual($min, $max): Bool_
    {
        return $this->value->betweenOrEqual($min, $max);
    }

    private static function fromNumeric(Numeric $numeric): self
    {
        return new self($numeric);
    }

    /**
     * @throws ThrowableInterface
     */
    public static function fromInt(int $value, int $precision): self
    {
        return self::fromNumeric(Numeric::fromInt($value, $precision));
    }

    /**
     * @throws ThrowableInterface
     */
    public static function fromFloat(float $value): self
    {
        return self::fromNumeric(Numeric::fromFloat($value));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function isZero(): Bool_
    {
        return $this->value->isZero();
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        return self::fromNumeric($this->value->abs());
    }
}
