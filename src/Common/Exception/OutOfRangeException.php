<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework out-of-range exception with throwable factory helpers.
 */
final class OutOfRangeException extends \OutOfRangeException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
