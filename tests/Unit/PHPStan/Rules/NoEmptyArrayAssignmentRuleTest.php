<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use TournayreLabs\PHPStan\Rules\NoEmptyArrayAssignmentRule;

/**
 * @extends RuleTestCase<NoEmptyArrayAssignmentRule>
 */
final class NoEmptyArrayAssignmentRuleTest extends RuleTestCase
{
    /** @var array<string> */
    private array $excludedPaths = [];

    protected function getRule(): Rule
    {
        return new NoEmptyArrayAssignmentRule($this->excludedPaths);
    }

    public function testReportsOnlyEmptyArrayAssignments(): void
    {
        $message = 'Assigning an empty array [] is forbidden, use TournayreLabs\Primitives\Collection::of([]) instead.';

        $this->analyse([__DIR__.'/Fixtures/empty_array_assignment.php'], [
            [$message, 9],
            [$message, 11],
        ]);
    }

    public function testSkipsExcludedPath(): void
    {
        $this->excludedPaths = ['Fixtures/'];

        $this->analyse([__DIR__.'/Fixtures/empty_array_assignment.php'], []);
    }
}
