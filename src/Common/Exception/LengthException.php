<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework length exception with throwable factory helpers.
 */
final class LengthException extends \LengthException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
