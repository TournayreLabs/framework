<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Fixtures;

use TournayreLabs\Contracts\Types\NumericInterface;
use TournayreLabs\Primitives\Traits\NumericTrait;

final class Price implements NumericInterface
{
    use NumericTrait;
}
