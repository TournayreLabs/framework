<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Templating;

use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface TemplatingInterface
{
    /**
     * @param array<string, mixed> $parameters
     *
     * @throws ThrowableInterface
     */
    public function render(string $template, array $parameters = []): string;
}
