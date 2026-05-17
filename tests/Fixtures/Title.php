<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Fixtures;

use TournayreLabs\Common\Traits\IsTrait;
use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullEnum;
use TournayreLabs\Null\NullTrait;

final class Title implements NullableInterface
{
    use NullTrait;
    use IsTrait;

    private readonly string $title;

    private function __construct(string $title)
    {
        $this->title = $title;
        $this->null = NullEnum::fromBool(false);
    }

    /**
     * @api
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @api
     */
    public static function create(string $title): Title
    {
        return new Title($title);
    }

    /**
     * @api
     */
    public static function asNull(): Title
    {
        $self = new self('Empty title');

        return $self->toNullable();
    }
}
