<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Persistance;

interface DatabasePersistenceInterface
{
    public function persist(): self;

    public function flush(): void;

    public function remove(): self;
}
