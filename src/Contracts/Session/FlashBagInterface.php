<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Session;

interface FlashBagInterface
{
    /**
     * @param string|array<string> $message
     */
    public function success($message): void;

    /**
     * @param string|array<string> $message
     */
    public function warning($message): void;

    /**
     * @param string|array<string> $message
     */
    public function error($message): void;

    /**
     * @param string|array<string> $message
     */
    public function info($message): void;

    /**
     * Use with caution, this method is used to display error messages from exceptions.
     */
    public function fromException(\Exception $exception): void;
}
