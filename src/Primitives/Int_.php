<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final readonly class Int_
{
    private function __construct(
        private int $value,
    ) {
    }

    /**
     * @param int|string|Int_ $value
     *
     * @throws ThrowableInterface
     */
    public static function of($value): self
    {
        if (Mixed_::of($value)->is()->instanceOf(self::class)->isTrue()) {
            return $value;
        }

        Assert::false(Mixed_::of($value)->is()->float()->isTrue(), 'Integer::of() expects parameter 1 to be integer or string, '.gettype($value).' given');

        return new self((int) $value);
    }

    /**
     * @api
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * @api
     */
    public function isPositive(): Bool_
    {
        $isPositive = $this->value > 0;

        return Bool_::fromBool($isPositive);
    }

    /**
     * @api
     */
    public function isNegative(): Bool_
    {
        $isNegative = $this->value < 0;

        return Bool_::fromBool($isNegative);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function isZero(): Bool_
    {
        return $this->equalsTo(0);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        return Int_::of(abs($this->value));
    }

    /**
     * @param int|Int_ $of
     * @param int|Int_ $of1
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function between($of, $of1): Bool_
    {
        $of = self::of($of);
        $of1 = self::of($of1);

        $between = $this->value > $of->value()
            && $this->value < $of1->value();

        return Bool_::fromBool($between);
    }

    /**
     * @param Int_|int $of
     * @param Int_|int $of1
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function betweenOrEqual($of, $of1): Bool_
    {
        $of = self::of($of);
        $of1 = self::of($of1);

        $betweenOrEqual = $this->value >= $of->value()
            && $this->value <= $of1->value();

        return Bool_::fromBool($betweenOrEqual);
    }

    /**
     * @api
     */
    public function isEven(): Bool_
    {
        $isEven = 0 === $this->value % 2;

        return Bool_::fromBool($isEven);
    }

    /**
     * @api
     */
    public function isOdd(): Bool_
    {
        $isOdd = 0 !== $this->value % 2;

        return Bool_::fromBool($isOdd);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThan($of): Bool_
    {
        $of = self::of($of);
        $greaterThan = $this->value > $of->value();

        return Bool_::fromBool($greaterThan);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThanOrEqual($of): Bool_
    {
        $of = self::of($of);
        $greaterThanOrEqual = $this->value >= $of->value();

        return Bool_::fromBool($greaterThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThan($of): Bool_
    {
        $of = self::of($of);
        $lessThan = $this->value < $of->value();

        return Bool_::fromBool($lessThan);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThanOrEqual($of): Bool_
    {
        $of = self::of($of);
        $lessThanOrEqual = $this->value <= $of->value();

        return Bool_::fromBool($lessThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function equalsTo($of): Bool_
    {
        $of = self::of($of);
        $equalsTo = $this->value === $of->value();

        return Bool_::fromBool($equalsTo);
    }
}
