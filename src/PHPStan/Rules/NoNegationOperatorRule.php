<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\BooleanNot;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;

/**
 * A file is excluded only when its path starts with an entry of `excludedPaths`.
 *
 * @implements Rule<BooleanNot>
 */
final readonly class NoNegationOperatorRule implements Rule
{
    /**
     * @param array<string> $excludedPaths
     */
    public function __construct(
        private array $excludedPaths = [],
    ) {
    }

    public function getNodeType(): string
    {
        return BooleanNot::class;
    }

    /**
     * @param BooleanNot $node
     *
     * @throws ShouldNotHappenException
     *
     * @return list<IdentifierRuleError>
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $file = $scope->getFile();

        foreach ($this->excludedPaths as $excludedPath) {
            if (str_starts_with($file, $excludedPath)) {
                return [];
            }
        }

        return [
            RuleErrorBuilder::message('Using the ! operator is forbidden, prefer an affirmative check with TournayreLabs\\Primitives\\Bool_ (Bool_::fromBool($x)->isFalse() / ->isTrue()). Fall back to a Yoda comparison (false === $x) only when wrapping in Bool_ is not possible (e.g. a framework API returning a raw bool).')
                ->identifier('tournayrelabs.noNegationOperator')
                ->build(),
        ];
    }
}
