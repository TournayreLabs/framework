<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class MutableException extends \RuntimeException implements ThrowableInterface
{
    use ThrowableTrait;

    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
