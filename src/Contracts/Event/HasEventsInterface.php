<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Event;

use TournayreLabs\Common\Collection\EventCollection;

interface HasEventsInterface
{
    public function initializeEvents(): void;

    public function events(): EventCollection;
}
