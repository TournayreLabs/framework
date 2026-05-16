<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

class BadMethodCallException extends \BadMethodCallException implements ThrowableInterface
{
    use ThrowableTrait;
}
