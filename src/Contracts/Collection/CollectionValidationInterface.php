<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Collection;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface CollectionValidationInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function validateCollection(): void;
}
