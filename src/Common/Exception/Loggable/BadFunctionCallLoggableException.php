<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception\Loggable;

use TournayreLabs\Contracts\Exception\LoggableThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class BadFunctionCallLoggableException extends \BadFunctionCallException implements ThrowableInterface, LoggableThrowableFactoryInterface
{
    use LoggableThrowableTrait;
}
