<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

/**
 * Framework domain exception with throwable factory helpers.
 */
final class DomainException extends \DomainException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
