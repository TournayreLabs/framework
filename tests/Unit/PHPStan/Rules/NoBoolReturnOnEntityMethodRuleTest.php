<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use TournayreLabs\PHPStan\Rules\NoBoolReturnOnEntityMethodRule;

/**
 * @extends RuleTestCase<NoBoolReturnOnEntityMethodRule>
 */
final class NoBoolReturnOnEntityMethodRuleTest extends RuleTestCase
{
    private const NAMESPACE = 'TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures';

    /** @var array<string> */
    private array $methodesLegacy = [];

    protected function getRule(): Rule
    {
        return new NoBoolReturnOnEntityMethodRule($this->methodesLegacy);
    }

    public function testReportsBoolMethodsOfEntitiesOnly(): void
    {
        $this->analyse([__DIR__.'/Fixtures/bool_return_on_entity.php'], [
            [$this->message('AttributeEntity::isEnabled'), 25],
            [$this->message('AttributeEntity::isMaybe'), 30],
            [$this->message('AttributeEntity::isLegacy'), 40],
            [$this->message('AnnotationEntity::isEnabled'), 66],
        ]);
    }

    public function testSkipsLegacyMethods(): void
    {
        $this->methodesLegacy = [self::NAMESPACE.'\AttributeEntity::isLegacy'];

        $this->analyse([__DIR__.'/Fixtures/bool_return_on_entity.php'], [
            [$this->message('AttributeEntity::isEnabled'), 25],
            [$this->message('AttributeEntity::isMaybe'), 30],
            [$this->message('AnnotationEntity::isEnabled'), 66],
        ]);
    }

    private function message(string $method): string
    {
        return sprintf(
            'Method %s\%s() of an entity returns bool: expose a business method returning TournayreLabs\Primitives\Bool_ (Bool_::fromBool($x)) instead of a native bool.',
            self::NAMESPACE,
            $method,
        );
    }
}
