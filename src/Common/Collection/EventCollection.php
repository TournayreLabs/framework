<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\VO\Event;
use TournayreLabs\Contracts\Collection\AddInterface;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Collection\AtLeastOneElementInterface;
use TournayreLabs\Contracts\Collection\ContainsInterface;
use TournayreLabs\Contracts\Collection\CountInterface;
use TournayreLabs\Contracts\Collection\EachInterface;
use TournayreLabs\Contracts\Collection\FirstInterface;
use TournayreLabs\Contracts\Collection\HasNoElementInterface;
use TournayreLabs\Contracts\Collection\HasOneElementInterface;
use TournayreLabs\Contracts\Collection\HasSeveralElementsInterface;
use TournayreLabs\Contracts\Collection\HasXElementsInterface;
use TournayreLabs\Contracts\Collection\KeysInterface;
use TournayreLabs\Contracts\Collection\LastInterface;
use TournayreLabs\Contracts\Collection\SearchInterface;
use TournayreLabs\Contracts\Collection\ToArrayInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * @deprecated This class is deprecated and will be removed in a future version.
 *             Use the Domain Events Management system instead.
 */
final class EventCollection implements AsMapInterface, AddInterface, ContainsInterface, SearchInterface, CountInterface, ToArrayInterface, FirstInterface, LastInterface, EachInterface, KeysInterface, HasXElementsInterface, HasNoElementInterface, HasOneElementInterface, HasSeveralElementsInterface, AtLeastOneElementInterface
{
    use CollectionTrait;

    /**
     * @param array<string, Event|mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection = []): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function filterByType(string $type): self
    {
        $clone = clone $this;
        $events = $clone
            ->collection
            ->filter(static fn (Event $event): bool => $event instanceof $type)
            ->toArray()
        ;

        $eventCollection = EventCollection::empty();
        foreach ($events as $event) {
            $eventCollection = $eventCollection->add($event);
        }

        return $eventCollection;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @api
     */
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum
    {
        return $this
            ->collection
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @api
     */
    public function search(mixed $value, bool $strict = true): int|string|null
    {
        return $this
            ->collection
            ->search($value, $strict)
        ;
    }

    /**
     * @api
     */
    public function remove(Event $event): void
    {
        $index = $this
            ->collection
            ->search($event)
        ;

        if (null === $index) {
            return;
        }

        $this
            ->collection
            ->offsetUnset($index)
        ;
    }

    /**
     * @api
     */
    public function dispatch(
        LoggerInterface $logger,
        MessageBusInterface $messageBus,
    ): void {
        $this
            ->collection
            ->each(
                function (Event $event) use ($logger, $messageBus): void {
                    $logger->info(sprintf('Dispatching %s event', $event->_type()), $event->toLog());

                    $messageBus->dispatch($event);
                    $this->remove($event);

                    $logger->info(sprintf('Event %s dispatched', $event->_type()), $event->toLog());
                },
            )
        ;
    }
}
