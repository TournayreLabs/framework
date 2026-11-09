<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use TournayreLabs\PHPStan\Rules\NoForeachRule;

/**
 * @extends RuleTestCase<NoForeachRule>
 */
final class NoForeachRuleTest extends RuleTestCase
{
    /** @var array<string> */
    private array $excludedPaths = [];

    protected function getRule(): Rule
    {
        return new NoForeachRule($this->excludedPaths);
    }

    public function testReportsForeach(): void
    {
        $this->analyse([__DIR__.'/Fixtures/foreach.php'], [
            [
                'Calling foreach() is forbidden, use TournayreLabs\Primitives\Collection instead.',
                9,
            ],
        ]);
    }

    public function testSkipsExcludedPath(): void
    {
        $this->excludedPaths = ['Fixtures/foreach.php'];

        $this->analyse([__DIR__.'/Fixtures/foreach.php'], []);
    }
}
