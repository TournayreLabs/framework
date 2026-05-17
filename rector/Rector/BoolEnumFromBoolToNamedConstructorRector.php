<?php

declare(strict_types=1);

namespace TournayreLabs\Rector;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class BoolEnumFromBoolToNamedConstructorRector extends AbstractRector
{
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [StaticCall::class];
    }

    public function refactor(Node $node): ?StaticCall
    {
        if (!$node instanceof StaticCall) {
            return null;
        }

        if (!$this->isName($node->name, 'fromBool')) {
            return null;
        }

        if (!$this->isBoolClass($node)) {
            return null;
        }

        $firstArg = $node->args[0] ?? null;

        if (!$firstArg instanceof Arg || isset($node->args[1])) {
            return null;
        }

        $methodName = $this->resolveNamedConstructor($firstArg);

        if (null === $methodName) {
            return null;
        }

        $node->class = new FullyQualified('TournayreLabs\Primitives\Bool_');
        $node->name = new Identifier($methodName);
        $node->args = [];

        return $node;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace BoolEnum::fromBool(true/false) with Bool_::asTrue()/asFalse().',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
BoolEnum::fromBool(true);
BoolEnum::fromBool(false);
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
Bool_::asTrue();
Bool_::asFalse();
CODE_SAMPLE,
                ),
            ],
        );
    }

    private function isBoolClass(StaticCall $staticCall): bool
    {
        return $this->isName($staticCall->class, 'TournayreLabs\Primitives\BoolEnum')
            || $this->isName($staticCall->class, 'BoolEnum');
    }

    private function resolveNamedConstructor(Arg $arg): ?string
    {
        if (!$arg->value instanceof ConstFetch) {
            return null;
        }

        if (!$arg->value->name instanceof Name) {
            return null;
        }

        if ($this->isName($arg->value->name, 'true')) {
            return 'asTrue';
        }

        if ($this->isName($arg->value->name, 'false')) {
            return 'asFalse';
        }

        return null;
    }
}
