<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection as Collection_;

trait Collection
{
    private function __construct(
        protected Collection_ $collection,
    ) {
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function of(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::of($collection));
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function readOnly(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::readOnly($collection));
    }

    public function isReadOnly(): BoolEnum
    {
        return $this->collection->isReadOnly();
    }
}
