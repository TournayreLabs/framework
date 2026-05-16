<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

class RuntimeException extends \RuntimeException implements ThrowableInterface
{
    use ThrowableTrait;
}
