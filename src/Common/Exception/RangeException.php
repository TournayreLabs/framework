<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework range exception with throwable factory helpers.
 */
final class RangeException extends \RangeException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
