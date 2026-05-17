<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Routing;

use Symfony\Component\Routing\RouterInterface;
use TournayreLabs\Contracts\Routing\ReferenceType;
use TournayreLabs\Contracts\Routing\RoutingInterface;

final readonly class RoutingService implements RoutingInterface
{
    public function __construct(
        private RouterInterface $router,
    ) {
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function generate(string $name, array $parameters = [], ReferenceType $referenceType = ReferenceType::ABSOLUTE_PATH): string
    {
        return $this->router->generate($name, $parameters, $referenceType->value);
    }
}
