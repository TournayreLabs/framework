<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Common\VO\Memory;
use TournayreLabs\Primitives\Traits\NumericTrait;

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
