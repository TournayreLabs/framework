<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Exception;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class NullException extends \Exception implements ThrowableInterface
{
    use ThrowableTrait;

    /**
     * @api
     */
    public static function null(): self
    {
        return self::new('Empty exception.');
    }
}
