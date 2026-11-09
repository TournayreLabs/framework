<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures;

function useForeach(array $items): void
{
    foreach ($items as $item) {
        echo $item;
    }
}
