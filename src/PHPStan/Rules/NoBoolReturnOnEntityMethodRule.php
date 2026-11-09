<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Rules;

use Doctrine\ORM\Mapping\Entity;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;
use PHPStan\Type\TypeCombinator;

/**
 * An entity exposes a Bool_, never a native bool.
 *
 * Existing bool methods are listed one by one (`Class::method`): they are neither fixed nor extended,
 * any new bool method on an entity is reported.
 *
 * @implements Rule<ClassMethod>
 */
final readonly class NoBoolReturnOnEntityMethodRule implements Rule
{
    /**
     * @param array<string> $methodesLegacy `Class::method` of the bool methods that existed before the rule
     */
    public function __construct(
        private array $methodesLegacy = [],
    ) {
    }

    public function getNodeType(): string
    {
        return ClassMethod::class;
    }

    /**
     * @param ClassMethod $node
     *
     * @throws ShouldNotHappenException
     *
     * @return list<IdentifierRuleError>
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $class = $scope->getClassReflection();
        if (null === $class || !$this->isEntity($class) || $node->isPrivate()) {
            return [];
        }

        $methodName = $node->name->toString();
        if ($this->isImposedByContract($class, $methodName) || !$this->returnsBool($class, $methodName)) {
            return [];
        }

        $method = sprintf('%s::%s', $class->getName(), $methodName);
        if (in_array($method, $this->methodesLegacy, true)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(sprintf(
                'Method %s() of an entity returns bool: expose a business method returning TournayreLabs\\Primitives\\Bool_ (Bool_::fromBool($x)) instead of a native bool.',
                $method,
            ))
                ->identifier('tournayrelabs.noBoolReturnOnEntity')
                ->build(),
        ];
    }

    private function isEntity(ClassReflection $class): bool
    {
        $reflection = $class->getNativeReflection();

        if ([] !== $reflection->getAttributes(Entity::class)) {
            return true;
        }

        $docComment = $reflection->getDocComment();

        return false !== $docComment && str_contains($docComment, '@ORM\\Entity');
    }

    /**
     * A method overriding a contract (parent class, interface) does not choose its own return type.
     */
    private function isImposedByContract(ClassReflection $class, string $methodName): bool
    {
        $parent = $class->getParentClass();
        if (null !== $parent && $parent->hasNativeMethod($methodName)) {
            return true;
        }

        foreach ($class->getInterfaces() as $interface) {
            if ($interface->hasNativeMethod($methodName)) {
                return true;
            }
        }

        return false;
    }

    private function returnsBool(ClassReflection $class, string $methodName): bool
    {
        $returnType = TypeCombinator::removeNull(
            $class->getNativeMethod($methodName)->getVariants()[0]->getReturnType(),
        );

        return $returnType->isBoolean()->yes();
    }
}
