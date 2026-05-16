<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail name (the name of the person sending or receiving the e-mail).
 */
final class EmailName
{
    use StringTypeTrait;
}
