<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\DateTime\DateTimeInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Ulid;

trait UlidTrait
{
    protected Ulid $ulid;

    private function __construct(Ulid $ulid)
    {
        $this->ulid = $ulid;
    }

    public static function of(string $string): self
    {
        return new self(Ulid::of($string));
    }

    public function toString(): string
    {
        return $this->ulid->toString();
    }

    public function equalsTo(self $ulid): BoolEnum
    {
        return $this->ulid->equalsTo($ulid->ulid);
    }

    public function toRfc4122(): StringType
    {
        return $this->ulid->toRfc4122();
    }

    /**
     * @throws ThrowableInterface
     */
    public function getDateTime(): DateTimeInterface
    {
        try {
            return $this->ulid->getDateTime();
        } catch (\Exception $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }
}
