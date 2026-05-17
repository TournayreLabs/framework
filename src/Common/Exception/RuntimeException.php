<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework runtime exception with throwable factory helpers.
 */
final class RuntimeException extends \RuntimeException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
