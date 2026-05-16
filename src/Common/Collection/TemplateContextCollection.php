<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

final class TemplateContextCollection implements AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, 'mixed');

        return new self(Collection::of($collection));
    }

    /**
     * @api
     *
     * @param mixed|null $offset
     */
    public function has($offset): BoolEnum
    {
        return $this->collection
            ->has($offset)
        ;
    }
}
