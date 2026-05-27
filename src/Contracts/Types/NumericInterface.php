<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Types;

interface NumericInterface
{
    public function value(): float;

    public function intValue(): int;

    public function precision(): int;
}
