<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Collection;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Component\Mailer\Types\EmailAddress;
use TournayreLabs\Contracts\Collection\AsListInterface;
use TournayreLabs\Contracts\Collection\AsMapInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Traits\CollectionTrait;

final class EmailAddressCollection implements AsListInterface, AsMapInterface
{
    use CollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, EmailAddress::class);

        return new self(Collection::of($collection));
    }

    /**
     * @param array<string> $emails
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function fromArray(array $emails): self
    {
        $map = Collection::of($emails)
            ->each(static fn (string $email) => EmailAddress::of($email))
            ->toArray()
        ;

        return EmailAddressCollection::asList($map);
    }
}
