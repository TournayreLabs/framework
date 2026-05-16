<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Templating;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Templating\TemplatingInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final readonly class TwigTemplatingService implements TemplatingInterface
{
    public function __construct(
        private Environment $twigEnvironment,
    ) {
    }

    /**
     * @throws ThrowableInterface
     */
    public function render(string $template, array $parameters = []): string
    {
        try {
            return $this->twigEnvironment->render($template, $parameters);
        } catch (SyntaxError|RuntimeError|LoaderError $e) {
            throw RuntimeException::fromThrowable($e);
        }
    }
}
