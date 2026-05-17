<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception\Loggable;

use TournayreLabs\Contracts\Exception\LoggableThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class OutOfRangeLoggableException extends \OutOfRangeException implements ThrowableInterface, LoggableThrowableFactoryInterface
{
    use LoggableThrowableTrait;
}
