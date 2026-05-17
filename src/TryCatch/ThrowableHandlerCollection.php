<?php

declare(strict_types=1);

namespace TournayreLabs\TryCatch;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\Collection\ToArrayInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\TryCatch\ThrowableHandlerCollectionInterface;
use TournayreLabs\Contracts\TryCatch\ThrowableHandlerInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\Collection\Add;
use TournayreLabs\Primitives\Traits\Collection\ToArray;

/**
 * Class ThrowableHandlerCollection.
 *
 * Collection of throwable handlers.
 */
final class ThrowableHandlerCollection implements ThrowableHandlerCollectionInterface, AsListInterface, ToArrayInterface
{
    use \TournayreLabs\Primitives\Traits\Collection;
    use Add;
    use ToArray;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(
        array $collection = [],
    ): self {
        Assert::allIsInstanceOf($collection, ThrowableHandlerCollectionInterface::class);

        return new self(
            collection: Collection::of($collection),
        );
    }

    /**
     * @throws ThrowableInterface
     *
     * @return ThrowableHandlerInterface<mixed>
     */
    public function findHandlerFor(\Throwable $throwable): ThrowableHandlerInterface
    {
        $handler = $this->collection->findOrDefault(
            static fn (ThrowableHandlerInterface $handler): bool => $handler->canHandle($throwable),
            null
        );

        if ($handler instanceof ThrowableHandlerInterface) {
            return $handler;
        }

        return NullThrowableHandler::new();
    }
}
