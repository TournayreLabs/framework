<?php

declare(strict_types=1);

namespace TournayreLabs\Common\VO;

use TournayreLabs\Primitives\Collection;

final readonly class Duration
{
    private const MILLISECONDS_IN_SECOND = 1000;

    private const SECONDS_IN_MINUTE = 60;

    private const MINUTES_IN_HOUR = 60;

    private const HOURS_IN_DAY = 24;

    private function __construct(
        private float|int $milliseconds,
    ) {
    }

    /**
     * @api
     */
    public static function of(float|int $milliseconds): self
    {
        return new self($milliseconds);
    }

    /**
     * @api
     *
     * @return int|float
     */
    public function asIs()
    {
        return $this->milliseconds;
    }

    /**
     * @api
     *
     * @return int|float
     */
    public function milliseconds()
    {
        return $this->milliseconds;
    }

    /**
     * @api
     */
    public function inSeconds(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND;
    }

    /**
     * @api
     */
    public function inMinutes(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE;
    }

    /**
     * @api
     */
    public function inHours(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR;
    }

    /**
     * @api
     */
    public function inDays(): float
    {
        return $this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR / self::HOURS_IN_DAY;
    }

    /**
     * @api
     */
    public function humanReadable(string $glue = ' '): string
    {
        $days = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR / self::HOURS_IN_DAY);
        $hours = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE / self::MINUTES_IN_HOUR) % self::HOURS_IN_DAY;
        $minutes = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND / self::SECONDS_IN_MINUTE) % self::MINUTES_IN_HOUR;
        $seconds = floor($this->milliseconds / self::MILLISECONDS_IN_SECOND) % self::SECONDS_IN_MINUTE;
        $milliseconds = $this->milliseconds % self::MILLISECONDS_IN_SECOND;

        $isNonNegative = fn ($value): bool => $value >= 0;
        $pluralize = fn ($value, $singular, $plural): string => $value <= 1 ? $singular : $plural;

        return Collection::of()
            ->pushWithCallback($days, $isNonNegative)
            ->pushWithCallback($pluralize($days, 'day', 'days').$glue, $isNonNegative)
            ->pushWithCallback($hours, $isNonNegative)
            ->pushWithCallback($pluralize($hours, 'hour', 'hours').$glue, $isNonNegative)
            ->pushWithCallback($minutes, $isNonNegative)
            ->pushWithCallback($pluralize($minutes, 'minute', 'minutes').$glue, $isNonNegative)
            ->pushWithCallback($seconds, $isNonNegative)
            ->pushWithCallback($pluralize($seconds, 'second', 'seconds').$glue, $isNonNegative)
            ->pushWithCallback($milliseconds, $isNonNegative)
            ->pushWithCallback($pluralize($milliseconds, 'millisecond', 'milliseconds'), $isNonNegative)
            ->join(' ')
        ;
    }
}
