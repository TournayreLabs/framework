<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework bad method call exception with throwable factory helpers.
 */
final class BadMethodCallException extends \BadMethodCallException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
