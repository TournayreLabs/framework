<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework overflow exception with throwable factory helpers.
 */
final class OverflowException extends \OverflowException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
