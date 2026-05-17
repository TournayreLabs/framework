<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework invalid argument exception with throwable factory helpers.
 */
final class InvalidArgumentException extends \InvalidArgumentException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
