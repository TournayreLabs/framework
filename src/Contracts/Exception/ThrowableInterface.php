<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Exception;

/**
 * Interface for throwable objects in the framework.
 *
 * This interface extends PHP's native \Throwable interface and provides
 * additional methods for manipulating exceptions in a fluent way.
 */
interface ThrowableInterface extends \Throwable
{
    /**
     * Sets the previous throwable.
     *
     * @param \Throwable $previous The previous throwable
     *
     * @return self A new instance with the previous throwable set
     */
    public function withPrevious(\Throwable $previous): self;

    /**
     * @throws ThrowableInterface Always throws this throwable
     */
    public function throw(): void;
}
