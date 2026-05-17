<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Event;

use TournayreLabs\Common\Collection\EventCollection;

interface EntityEventDispatcherInterface
{
    public function dispatch(EventCollection $eventCollection): void;

    public function dispatchByType(EventCollection $eventCollection, string $type): void;
}
