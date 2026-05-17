<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class UnexpectedValueException extends \UnexpectedValueException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
