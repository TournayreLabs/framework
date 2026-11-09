<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Extension;

use PHPStan\Type\WebMozartAssert\AssertTypeSpecifyingExtension;
use TournayreLabs\Common\Assert\Assert;

/**
 * Teaches PHPStan the narrowing of TournayreLabs\Common\Assert\Assert, like webmozart/assert.
 *
 * Requires phpstan/phpstan-webmozart-assert.
 */
final class TournayreLabsAssertTypeSpecifyingExtension extends AssertTypeSpecifyingExtension
{
    public function getClass(): string
    {
        return Assert::class;
    }
}
