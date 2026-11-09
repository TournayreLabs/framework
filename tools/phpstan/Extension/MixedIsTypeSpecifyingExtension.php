<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Extension;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Analyser\SpecifiedTypes;
use PHPStan\Analyser\TypeSpecifier;
use PHPStan\Analyser\TypeSpecifierAwareExtension;
use PHPStan\Analyser\TypeSpecifierContext;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\CallableType;
use PHPStan\Type\Constant\ConstantStringType;
use PHPStan\Type\FloatType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MethodTypeSpecifyingExtension;
use PHPStan\Type\MixedType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ObjectWithoutClassType;
use PHPStan\Type\StringType;
use PHPStan\Type\Type;
use PHPStan\Type\UnionType;
use TournayreLabs\Primitives\Bool_;

/**
 * Teaches PHPStan to narrow types through the Mixed_::of($x)->is()->*()->isTrue() chain.
 *
 * Without this extension, PHPStan cannot track that $x is a string after:
 *   if (Mixed_::of($x)->is()->string()->isTrue()) { ... }
 *
 * This extension traverses the AST chain back to the original variable $x
 * and narrows its type in the truthy/falsy branch accordingly.
 */
final class MixedIsTypeSpecifyingExtension implements MethodTypeSpecifyingExtension, TypeSpecifierAwareExtension
{
    private TypeSpecifier $typeSpecifier;

    private const TRUE_METHODS = ['isTrue', 'yes'];
    private const FALSE_METHODS = ['isFalse', 'no'];

    private const SUPPORTED_TYPE_CHECKS = [
        'string', 'int', 'float', 'bool', 'array',
        'null', 'object', 'numeric', 'scalar', 'callable', 'instanceOf',
    ];

    public function setTypeSpecifier(TypeSpecifier $typeSpecifier): void
    {
        $this->typeSpecifier = $typeSpecifier;
    }

    public function getClass(): string
    {
        return Bool_::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection, MethodCall $node, TypeSpecifierContext $context): bool
    {
        if ($context->null()) {
            return false;
        }

        $name = $methodReflection->getName();
        if (!in_array($name, [...self::TRUE_METHODS, ...self::FALSE_METHODS], true)) {
            return false;
        }

        return null !== $this->extractChain($node);
    }

    public function specifyTypes(MethodReflection $methodReflection, MethodCall $node, Scope $scope, TypeSpecifierContext $context): SpecifiedTypes
    {
        $chain = $this->extractChain($node);
        if (null === $chain) {
            return new SpecifiedTypes();
        }

        [$expr, $typeCheckMethod, $typeCheckNode] = $chain;

        $type = $this->resolveType($typeCheckMethod, $typeCheckNode, $scope);
        if (null === $type) {
            return new SpecifiedTypes();
        }

        $isTrueVariant = in_array($methodReflection->getName(), self::TRUE_METHODS, true);

        // For isTrue()/yes(): positive narrowing when condition is truthy, negative when falsy
        // For isFalse()/no(): positive narrowing when condition is falsy, negative when truthy
        // PHPStan calls specifyTypes twice: once with createTrue() for the if-body,
        // once with createFalse() for the else-body. We must respect $context to avoid
        // applying the positive narrowing to the wrong branch.
        $isPositiveNarrowing = $isTrueVariant === $context->truthy();
        $specifyContext = $isPositiveNarrowing
            ? TypeSpecifierContext::createTrue()
            : TypeSpecifierContext::createFalse();

        return $this->typeSpecifier->create($expr, $type, $specifyContext, false, $scope);
    }

    /**
     * Traverses Mixed_::of($x)->is()->typeCheck()->isTrue() and returns
     * [$x expression, type-check method name, type-check MethodCall node].
     *
     * @return array{0: Expr, 1: string, 2: MethodCall}|null
     */
    private function extractChain(MethodCall $node): ?array
    {
        // $node->var must be the type-check call (e.g., ->string())
        if (!$node->var instanceof MethodCall) {
            return null;
        }
        $typeCheckCall = $node->var;

        if (!$typeCheckCall->name instanceof Identifier) {
            return null;
        }
        $typeCheckMethod = $typeCheckCall->name->name;

        if (!in_array($typeCheckMethod, self::SUPPORTED_TYPE_CHECKS, true)) {
            return null;
        }

        // $typeCheckCall->var must be ->is()
        if (!$typeCheckCall->var instanceof MethodCall) {
            return null;
        }
        $isCall = $typeCheckCall->var;

        if (!$isCall->name instanceof Identifier || 'is' !== $isCall->name->name) {
            return null;
        }

        // $isCall->var must be Mixed_::of($x)
        if (!$isCall->var instanceof StaticCall) {
            return null;
        }
        $ofCall = $isCall->var;

        if (!$ofCall->name instanceof Identifier || 'of' !== $ofCall->name->name) {
            return null;
        }

        if (empty($ofCall->args) || !$ofCall->args[0] instanceof Arg) {
            return null;
        }

        return [$ofCall->args[0]->value, $typeCheckMethod, $typeCheckCall];
    }

    private function resolveType(string $method, MethodCall $node, Scope $scope): ?Type
    {
        return match ($method) {
            'string' => new StringType(),
            'int' => new IntegerType(),
            'float' => new FloatType(),
            'bool' => new BooleanType(),
            'array' => new ArrayType(new MixedType(), new MixedType()),
            'null' => new NullType(),
            'object' => new ObjectWithoutClassType(),
            'numeric' => new UnionType([new IntegerType(), new FloatType()]),
            'scalar' => new UnionType([new IntegerType(), new FloatType(), new StringType(), new BooleanType()]),
            'callable' => new CallableType(),
            'instanceOf' => $this->resolveInstanceOfType($node, $scope),
            default => null,
        };
    }

    private function resolveInstanceOfType(MethodCall $node, Scope $scope): ?Type
    {
        if (empty($node->args) || !$node->args[0] instanceof Arg) {
            return null;
        }

        $classType = $scope->getType($node->args[0]->value);
        if (!$classType instanceof ConstantStringType) {
            return null;
        }

        return new ObjectType($classType->getValue());
    }
}
