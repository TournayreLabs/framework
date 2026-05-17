<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework mutability exception used when an object must stay immutable.
 */
final class MutableException extends \RuntimeException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;

    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
