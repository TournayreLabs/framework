<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final readonly class Numeric
{
    private float $value;

    private int $intValue;

    private int $precision;

    /**
     * @throws ThrowableInterface
     */
    public static function fromFloat(float $float): self
    {
        $precision = String_::fromString((string) $float)
            ->afterLast('.')
            ->length()
            ->intValue()
        ;

        return new self($float, $precision);
    }

    /**
     * @throws ThrowableInterface
     */
    public static function of(float|int|string $value, int $precision = 0): self
    {
        return new self($value, $precision);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public static function zero(int $precision = 0): self
    {
        return self::of(0, $precision);
    }

    /**
     * @throws ThrowableInterface
     */
    private function __construct(
        float|int|string $value,
        int $precision,
    ) {
        if ($precision < 0) {
            InvalidArgumentException::new('Precision cannot be negative.')->throw();
        }

        if (is_string($value) && !is_numeric($value)) {
            InvalidArgumentException::new('The provided string value must be numeric.')->throw();
        }

        $numericValue = (float) $value;

        if ((abs($numericValue) < PHP_FLOAT_MIN || abs($numericValue) > PHP_FLOAT_MAX) && 0.0 !== $numericValue) {
            $message = sprintf('The value %s is out of range [%s, %s] for floating point numbers.', $numericValue, PHP_FLOAT_MIN, PHP_FLOAT_MAX);
            InvalidArgumentException::new($message)->throw();
        }

        $multiplier = 10 ** $precision;
        $intValue = intval(round($numericValue * $multiplier));

        if ($intValue < PHP_INT_MIN || $intValue > PHP_INT_MAX) {
            $message = sprintf('The value %s exceeds the allowed limits [%s, %s].', $intValue, PHP_INT_MIN, PHP_INT_MAX);
            InvalidArgumentException::new($message)->throw();
        }

        $this->value = $numericValue;
        $this->intValue = $intValue;
        $this->precision = $precision;
    }

    /**
     * @api
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function intValue(): int
    {
        return $this->intValue;
    }

    /**
     * @api
     */
    public function precision(): int
    {
        return $this->precision;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->code(), \NumberFormatter::DECIMAL);

        $format = $fmt->format($this->value);
        if (false === $format) {
            RuntimeException::new('Failed to format the number.')->throw();
        }

        return $format;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return match ($mode) {
            PHP_ROUND_HALF_UP => self::of(round($this->value, $this->precision), $this->precision),
            PHP_ROUND_HALF_DOWN => self::of(round($this->value, $this->precision, PHP_ROUND_HALF_DOWN), $this->precision),
            PHP_ROUND_HALF_EVEN => self::of(round($this->value, $this->precision, PHP_ROUND_HALF_EVEN), $this->precision),
            PHP_ROUND_HALF_ODD => self::of(round($this->value, $this->precision, PHP_ROUND_HALF_ODD), $this->precision),
            default => InvalidArgumentException::new('Invalid rounding mode provided.')->throw(),
        };
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThan = $this->value > $that->intValue();

        return Bool_::fromBool($greaterThan);
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThanOrEqual = $this->value >= $that->value();

        return Bool_::fromBool($greaterThanOrEqual);
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThan = $this->value < $that->value();

        return Bool_::fromBool($lessThan);
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThanOrEqual = $this->value <= $that->value();

        return Bool_::fromBool($lessThanOrEqual);
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value === $that->value();

        return Bool_::fromBool($equalTo);
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
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value !== $that->value();

        return Bool_::fromBool($equalTo);
    }

    /**
     * @api
     *
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     */
    public function between($min, $max): Bool_
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThan($min)->isTrue()
            && $this->lessThan($max)->isTrue();

        return Bool_::fromBool($between);
    }

    /**
     * @api
     *
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     */
    public function betweenOrEqual($min, $max): Bool_
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThanOrEqual($min)->isTrue()
            && $this->lessThanOrEqual($max)->isTrue();

        return Bool_::fromBool($between);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function fromInt(int $value, int $precision): Numeric
    {
        return Numeric::of($value, $precision);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function isZero(): Bool_
    {
        $isZero = $this->equalTo(0)
            ->isTrue()
        ;

        return Bool_::fromBool($isZero);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        return self::of(abs($this->value), $this->precision);
    }
}
