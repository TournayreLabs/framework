<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Common\VO\Memory;
use TournayreLabs\Primitives\Traits\NumericTrait;

/**
 * Represents a maximum attachment size as an immutable numeric value.
 *
 * Use memory() to convert the raw numeric value to a Memory object.
 */
final class AttachmentMaxSize
{
    use NumericTrait;

    /**
     * @api
     */
    public function memory(): Memory
    {
        return Memory::fromBytes($this->value->intValue());
    }
}
