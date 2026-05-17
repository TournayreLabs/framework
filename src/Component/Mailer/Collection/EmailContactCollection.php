<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Component\Mailer\VO\EmailContact;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Primitives\BoolEnum;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

final class EmailContactCollection implements LoggableInterface, AsListInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailContact::class);

        return new self(Collection::of($collection));
    }

    /**
     * @return array<array<string, string>>
     */
    public function toLog(): array
    {
        return $this->collection
            ->map(fn (EmailContact $emailContact) => $emailContact->toLog())
            ->toArray()
        ;
    }

    /**
     * @api
     */
    public function contains(EmailContact $emailContact): BoolEnum
    {
        return $this->collection->contains($emailContact);
    }
}
