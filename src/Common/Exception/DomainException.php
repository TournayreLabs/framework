<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class DomainException extends \DomainException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
