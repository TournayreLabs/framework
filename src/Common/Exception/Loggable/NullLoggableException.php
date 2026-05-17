<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception\Loggable;

use TournayreLabs\Contracts\Exception\LoggableThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;

final class NullLoggableException extends \Exception implements ThrowableInterface, LoggableThrowableFactoryInterface
{
    use LoggableThrowableTrait;

    /**
     * @api
     *
     * @param array<array-key, mixed> $context
     */
    public static function null(LoggerInterface $logger, array $context = []): self
    {
        return self::new($logger, 'Empty exception.', context: $context);
    }
}
