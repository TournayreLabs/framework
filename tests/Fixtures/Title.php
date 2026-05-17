<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Fixtures;

use TournayreLabs\Common\Traits\IsTrait;
use TournayreLabs\Contracts\Null\NullableInterface;
use TournayreLabs\Null\NullTrait;

final class Title implements NullableInterface
{
    use NullTrait;
    use IsTrait;

    /**
     * @api
     */
    public string $title;

    private function __construct(string $title)
    {
        $this->title = $title;
        $this->initializeNull();
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
