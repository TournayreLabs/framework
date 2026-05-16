<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Event;

use TournayreLabs\Common\Collection\EventCollection;

interface EntityEventDispatcherInterface
{
    public function dispatch(EventCollection $eventCollection, ?string $type = null): void;
}
