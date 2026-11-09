<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Extension;

use PHPStan\Testing\TypeInferenceTestCase;

final class TournayreLabsAssertTypeSpecifyingExtensionTest extends TypeInferenceTestCase
{
    /**
     * @return iterable<mixed>
     */
    public static function dataAsserts(): iterable
    {
        yield from self::gatherAssertTypes(__DIR__.'/Fixtures/assert_narrowing.php');
    }

    /**
     * @dataProvider dataAsserts
     */
    public function testAsserts(string $assertType, string $file, mixed ...$args): void
    {
        $this->assertFileAsserts($assertType, $file, ...$args);
    }

    /**
     * @return list<string>
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__.'/../../../../vendor/phpstan/phpstan-webmozart-assert/extension.neon',
            __DIR__.'/extension.neon',
        ];
    }
}
