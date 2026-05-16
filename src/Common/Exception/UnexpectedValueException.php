<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

class UnexpectedValueException extends \UnexpectedValueException implements ThrowableInterface
{
    use ThrowableTrait;
}
