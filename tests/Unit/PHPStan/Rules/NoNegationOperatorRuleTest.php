<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use TournayreLabs\PHPStan\Rules\NoNegationOperatorRule;

/**
 * @extends RuleTestCase<NoNegationOperatorRule>
 */
final class NoNegationOperatorRuleTest extends RuleTestCase
{
    /** @var array<string> */
    private array $excludedPaths = [];

    protected function getRule(): Rule
    {
        return new NoNegationOperatorRule($this->excludedPaths);
    }

    public function testReportsNegationOperator(): void
    {
        $this->analyse([__DIR__.'/Fixtures/negation.php'], [
            [
                'Using the ! operator is forbidden, prefer an affirmative check with TournayreLabs\Primitives\Bool_ (Bool_::fromBool($x)->isFalse() / ->isTrue()). Fall back to a Yoda comparison (false === $x) only when wrapping in Bool_ is not possible (e.g. a framework API returning a raw bool).',
                9,
            ],
        ]);
    }

    public function testSkipsPathStartingWithExcludedEntry(): void
    {
        $this->excludedPaths = [__DIR__.'/Fixtures/'];

        $this->analyse([__DIR__.'/Fixtures/negation.php'], []);
    }

    public function testDoesNotSkipPathOnlyContainingExcludedEntry(): void
    {
        $this->excludedPaths = ['Fixtures/'];

        $this->analyse([__DIR__.'/Fixtures/negation.php'], [
            [
                'Using the ! operator is forbidden, prefer an affirmative check with TournayreLabs\Primitives\Bool_ (Bool_::fromBool($x)->isFalse() / ->isTrue()). Fall back to a Yoda comparison (false === $x) only when wrapping in Bool_ is not possible (e.g. a framework API returning a raw bool).',
                9,
            ],
        ]);
    }
}
