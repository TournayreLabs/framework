<?php

declare(strict_types=1);

namespace TournayreLabs\TryCatch;

use TournayreLabs\Contracts\TryCatch\ThrowableHandlerInterface;
use TournayreLabs\Primitives\Mixed_;

/**
 * Class ThrowableHandler.
 *
 * Implementation for throwable handlers.
 *
 * @implements ThrowableHandlerInterface<mixed>
 */
final readonly class ThrowableHandler implements ThrowableHandlerInterface
{
    private function __construct(
        private string $throwableClass,
        private \Closure $handlerFunction,
    ) {
    }

    public static function new(
        string $throwableClass,
        \Closure $handlerFunction,
    ): self {
        return new self($throwableClass, $handlerFunction);
    }

    public function canHandle(\Throwable $throwable): bool
    {
        return Mixed_::of($throwable)->is()->instanceOf($this->throwableClass)->isTrue();
    }

    public function handle(\Throwable $throwable): mixed
    {
        return ($this->handlerFunction)($throwable);
    }
}
