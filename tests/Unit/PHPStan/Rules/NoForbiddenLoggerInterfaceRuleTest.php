<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use TournayreLabs\PHPStan\Rules\NoForbiddenLoggerInterfaceRule;

/**
 * @extends RuleTestCase<NoForbiddenLoggerInterfaceRule>
 */
final class NoForbiddenLoggerInterfaceRuleTest extends RuleTestCase
{
    /** @var array<string> */
    private array $excludedPaths = [];

    /** @var array<string>|null */
    private ?array $forbiddenNames = null;

    protected function getRule(): Rule
    {
        return null === $this->forbiddenNames
            ? new NoForbiddenLoggerInterfaceRule($this->excludedPaths)
            : new NoForbiddenLoggerInterfaceRule($this->excludedPaths, $this->forbiddenNames);
    }

    public function testReportsTypeHint(): void
    {
        $this->analyse([__DIR__.'/Fixtures/logger_interface.php'], [
            ['use TournayreLabs\Contracts\Log\LoggerInterface instead', 10],
        ]);
    }

    public function testForbiddenNamesAreConfigurable(): void
    {
        $this->forbiddenNames = ['TournayreLabs\Contracts\Log\LoggerInterface'];

        $this->analyse([__DIR__.'/Fixtures/logger_interface.php'], [
            ['use TournayreLabs\Contracts\Log\LoggerInterface instead', 14],
        ]);
    }

    public function testSkipsExcludedPath(): void
    {
        $this->excludedPaths = ['Fixtures/logger_interface.php'];

        $this->analyse([__DIR__.'/Fixtures/logger_interface.php'], []);
    }
}
