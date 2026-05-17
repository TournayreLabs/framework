<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Uuid;

trait UuidTrait
{
    protected Uuid $uuid;

    private function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function of(string $string): self
    {
        return new self(Uuid::of($string));
    }

    /**
     * @api
     */
    public static function v4(): self
    {
        return new self(Uuid::v4());
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public function equalsTo(self $uuid): Bool_
    {
        return $this->uuid->equalsTo($uuid->uuid);
    }

    public function toRfc4122(): String_
    {
        return $this->uuid->toRfc4122();
    }
}
