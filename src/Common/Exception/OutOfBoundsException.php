<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework out-of-bounds exception with throwable factory helpers.
 */
final class OutOfBoundsException extends \OutOfBoundsException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
