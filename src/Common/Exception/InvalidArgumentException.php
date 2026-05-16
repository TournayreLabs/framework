<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class InvalidArgumentException extends \InvalidArgumentException implements ThrowableInterface
{
    use ThrowableTrait;
}
