<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class OverflowException extends \OverflowException implements ThrowableInterface, ThrowableFactoryInterface
{
    use ThrowableTrait;
}
