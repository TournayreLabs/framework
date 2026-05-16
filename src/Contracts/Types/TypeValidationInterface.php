<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Types;

use TournayreLabs\Common\Collection\Validation\ValidationCollection;

interface TypeValidationInterface
{
    public function validate(): ValidationCollection;
}
