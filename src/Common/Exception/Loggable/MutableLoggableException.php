<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception\Loggable;

use TournayreLabs\Contracts\Exception\LoggableThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;

/**
 * Loggable mutability exception used when an object must stay immutable.
 */
final class MutableLoggableException extends \RuntimeException implements ThrowableInterface, LoggableThrowableFactoryInterface
{
    use LoggableThrowableTrait;

    /**
     * @param array<array-key, mixed> $context
     *
     * @api
     */
    public static function becauseMustBeImmutable(LoggerInterface $logger, array $context = []): self
    {
        return self::new($logger, 'Must be immutable.', context: $context);
    }
}
