<?php

declare(strict_types=1);

namespace TournayreLabs\Rector;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class StringNormalizeConstFetchToMethodCallRector extends AbstractRector
{
    private const METHOD_BY_CONSTANT = [
        'NFC' => 'normalizeNfc',
        'NFD' => 'normalizeNfd',
        'NFKC' => 'normalizeNfkc',
        'NFKD' => 'normalizeNfkd',
    ];

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    public function refactor(Node $node): ?MethodCall
    {
        if (!$node instanceof MethodCall) {
            return null;
        }

        if (!$this->isName($node->name, 'normalize')) {
            return null;
        }

        if ([] === $node->args) {
            $node->name = new Identifier('normalizeNfc');

            return $node;
        }

        $firstArg = $node->args[0] ?? null;

        if (!$firstArg instanceof Arg || isset($node->args[1])) {
            return null;
        }

        $methodName = $this->resolveMethodName($firstArg->value);

        if (null === $methodName) {
            return null;
        }

        $node->name = new Identifier($methodName);
        $node->args = [];

        return $node;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace String_::NFC/NFD/NFKC/NFKD normalize arguments with dedicated methods.',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
$string->normalize(StringType::NFC);
$string->normalize(StringType::NFD);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
$string->normalizeNfc();
$string->normalizeNfd();
CODE_SAMPLE,
                ),
            ],
        );
    }

    private function resolveMethodName(Node $node): ?string
    {
        if (!$node instanceof ClassConstFetch) {
            return null;
        }

        if (!$this->isStringClass($node)) {
            return null;
        }

        $constantName = $this->getName($node->name);

        if (null === $constantName) {
            return null;
        }

        return self::METHOD_BY_CONSTANT[$constantName] ?? null;
    }

    private function isStringClass(ClassConstFetch $classConstFetch): bool
    {
        return $this->isName($classConstFetch->class, 'TournayreLabs\Primitives\StringType')
            || $this->isName($classConstFetch->class, 'TournayreLabs\Primitives\String_')
            || $this->isName($classConstFetch->class, 'StringType')
            || $this->isName($classConstFetch->class, 'String_');
    }
}
