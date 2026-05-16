<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Routing;

interface RoutingInterface
{
    /**
     * @param array<string, mixed> $parameters
     */
    public function generate(string $name, array $parameters = [], ReferenceType $referenceType = ReferenceType::ABSOLUTE_PATH): string;
}
