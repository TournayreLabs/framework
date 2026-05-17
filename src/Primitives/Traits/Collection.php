<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives\Traits;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection as Collection_;

/**
 * Provides collection wrapper behavior around the Collection primitive.
 */
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

    public function isReadOnly(): Bool_
    {
        return $this->collection->isReadOnly();
    }
}
