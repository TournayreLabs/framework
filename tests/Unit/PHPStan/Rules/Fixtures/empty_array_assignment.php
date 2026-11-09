<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures;

function emptyArrayAssignments(): array
{
    $empty = [];
    $filled = [1];
    $short = [];

    foo([]);

    return [];
}

function withDefault(array $default = []): array
{
    return $default;
}
