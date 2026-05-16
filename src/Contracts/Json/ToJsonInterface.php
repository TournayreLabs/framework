<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Json;

interface ToJsonInterface
{
    /**
     * @param array<string, mixed> $options
     */
    public function json(array $options = []): string;
}
