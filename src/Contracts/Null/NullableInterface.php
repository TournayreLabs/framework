<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Null;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface NullableInterface
{
    public function toNullable(): self;

    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function asNull(): self;

    public function orNull(): ?self;

    /**
     * @throws ThrowableInterface
     *
     * @return $this
     */
    public function orThrow(\Throwable|callable $throwable): self;
}
