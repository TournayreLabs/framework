<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Common\Collection;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Common\Collection\TemplateContextCollection;

final class TemplateContextCollectionTest extends TestCase
{
    public function testAsMapWithValidInput(): void
    {
        $input = [
            'key' => 'value',
            'date' => new \DateTime('204-06-23'),
        ];
        $collection = TemplateContextCollection::asMap($input);

        self::assertEquals($input, $collection->toArray());
    }
}
