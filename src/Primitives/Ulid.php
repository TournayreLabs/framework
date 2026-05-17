<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use Symfony\Component\Uid\Ulid as SymfonyUlid;

final readonly class Ulid
{
    private function __construct(
        private SymfonyUlid $ulid,
    ) {
    }

    /**
     * @api
     */
    public static function of(): Ulid
    {
        return new self(new SymfonyUlid());
    }

    /**
     * @api
     */
    public static function fromString(string $string): Ulid
    {
        return new self(new SymfonyUlid($string));
    }

    /**
     * @api
     */
    public function toString(): string
    {
        return $this->ulid->toBase32();
    }

    /**
     * @api
     */
    public function equalsTo(self $ulid): Bool_
    {
        $equalsTo = $this->ulid->equals($ulid->ulid);

        return Bool_::fromBool($equalsTo);
    }

    /**
     * @api
     */
    public function toRfc4122(): StringType
    {
        $rfc4122 = $this->ulid->toRfc4122();

        return StringType::of($rfc4122);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function dateTime(): DateTimeInterface
    {
        return DateTime::of($this->ulid->getDateTime());
    }
}
