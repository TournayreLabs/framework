<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail username (before the @ symbol in an e-mail address).
 */
final class EmailUserName
{
    use StringTypeTrait;
}
