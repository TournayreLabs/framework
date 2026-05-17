<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Fixtures\Collection;

use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Collection\MapInterface;
use TournayreLabs\Contracts\Collection\MergeInterface;
use TournayreLabs\Contracts\Collection\SetInterface;
use TournayreLabs\Contracts\Collection\ToArrayInterface;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\Collection;
use TournayreLabs\Primitives\Traits\Collection\Join;
use TournayreLabs\Primitives\Traits\Collection\Map;
use TournayreLabs\Primitives\Traits\Collection\Merge;
use TournayreLabs\Primitives\Traits\Collection\Set;
use TournayreLabs\Primitives\Traits\Collection\ToArray;

final class CodeCollection implements AsMapInterface, AsListInterface, MergeInterface, SetInterface, MapInterface, ToArrayInterface
{
    use Collection;
    use Set;
    use Merge;
    use Map;
    use ToArray;
    use Join;

    /**
     * @param array<int|string,mixed> $collection
     */
    public static function asMap(array $collection = []): self
    {
        $collection = [
            'key1' => StringType::of('value1'),
            'key2' => StringType::of('value2'),
        ];

        return self::of($collection);
    }

    /**
     * @param array<int|string,mixed> $collection
     */
    public static function asList(array $collection = []): self
    {
        $collection = [
            StringType::of('value1'),
            StringType::of('value2'),
        ];

        return self::of($collection);
    }
}
