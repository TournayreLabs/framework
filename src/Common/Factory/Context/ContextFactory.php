<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Factory\Context;

use Psr\Clock\ClockInterface;
use TournayreLabs\Common\VO\Context\Context;
use TournayreLabs\Contracts\Context\ContextInterface;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Security\SecurityInterface;
use TournayreLabs\Contracts\Security\UserInterface;

final readonly class ContextFactory
{
    public function __construct(
        private SecurityInterface $security,
        private ClockInterface $clock,
    ) {
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function fromUser(UserInterface $user): ContextInterface
    {
        $dateTime = $this->clock->now();

        return $this->create($user, $dateTime);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function fromDateTime(\DateTimeInterface $dateTime): ContextInterface
    {
        $user = $this->security->user();

        return $this->create($user, $dateTime);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function create(UserInterface $user, \DateTimeInterface $dateTime): ContextInterface
    {
        return Context::create($user, $dateTime);
    }
}
