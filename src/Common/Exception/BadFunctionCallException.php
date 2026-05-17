<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class BadFunctionCallException extends \BadFunctionCallException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
