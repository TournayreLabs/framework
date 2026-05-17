<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionType;
use ReflectionUnionType;

final class PublicSignatureCompatibilityTest extends TestCase
{
    public function testPlannedPublicSymbolsKeepTheirExpectedSignatures(): void
    {
        $expected = $this->expectedSignatures();

        self::assertCount(100, $expected);

        foreach ($expected as $fqcn => $signature) {
            self::assertTrue(
                class_exists($fqcn) || interface_exists($fqcn) || trait_exists($fqcn) || enum_exists($fqcn),
                sprintf('Expected symbol "%s" to be autoloadable.', $fqcn),
            );

            self::assertSame($signature, $this->signatureFor($fqcn), $fqcn);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function expectedSignatures(): array
    {
        $json = file_get_contents(__DIR__.'/../Fixtures/public-signatures.json');

        self::assertIsString($json);

        $data = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        self::assertIsArray($data);

        return $data;
    }

    /**
     * @return array<string, mixed>
     */
    private function signatureFor(string $fqcn): array
    {
        $reflection = new ReflectionClass($fqcn);
        $methods = [];

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== $fqcn) {
                continue;
            }

            $methods[$method->getName()] = $this->methodSignature($method);
        }

        ksort($methods);

        return [
            'kind' => $reflection->isEnum()
                ? 'enum'
                : ($reflection->isInterface() ? 'interface' : ($reflection->isTrait() ? 'trait' : 'class')),
            'abstract' => $reflection->isAbstract() && !$reflection->isInterface() && !$reflection->isTrait(),
            'final' => $reflection->isFinal(),
            'methods' => array_values($methods),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function methodSignature(ReflectionMethod $method): array
    {
        return [
            'name' => $method->getName(),
            'visibility' => $method->isPublic() ? 'public' : ($method->isProtected() ? 'protected' : 'private'),
            'static' => $method->isStatic(),
            'abstract' => $method->isAbstract(),
            'final' => $method->isFinal(),
            'returnType' => $this->typeToString($method->getReturnType()),
            'returnsReference' => $method->returnsReference(),
            'parameters' => array_map(
                fn (ReflectionParameter $parameter): array => $this->parameterSignature($parameter),
                $method->getParameters(),
            ),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function parameterSignature(ReflectionParameter $parameter): array
    {
        return [
            'name' => $parameter->getName(),
            'type' => $this->typeToString($parameter->getType()),
            'optional' => $parameter->isOptional(),
            'default' => $this->defaultValue($parameter),
            'variadic' => $parameter->isVariadic(),
            'passedByReference' => $parameter->isPassedByReference(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function defaultValue(ReflectionParameter $parameter): array
    {
        if (!$parameter->isDefaultValueAvailable()) {
            return ['available' => false];
        }

        if ($parameter->isDefaultValueConstant()) {
            return [
                'available' => true,
                'constant' => $parameter->getDefaultValueConstantName(),
            ];
        }

        return [
            'available' => true,
            'value' => $parameter->getDefaultValue(),
        ];
    }

    private function typeToString(?ReflectionType $type): ?string
    {
        if ($type === null) {
            return null;
        }

        if ($type instanceof ReflectionNamedType) {
            return ($type->allowsNull() && !in_array($type->getName(), ['mixed', 'null'], true) ? '?' : '')
                .$type->getName();
        }

        if ($type instanceof ReflectionUnionType) {
            return implode('|', array_map(fn (ReflectionType $innerType): ?string => $this->typeToString($innerType), $type->getTypes()));
        }

        if ($type instanceof ReflectionIntersectionType) {
            return implode('&', array_map(fn (ReflectionType $innerType): ?string => $this->typeToString($innerType), $type->getTypes()));
        }

        return (string) $type;
    }
}
