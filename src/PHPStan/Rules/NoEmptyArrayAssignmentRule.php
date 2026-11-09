<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rule<Assign>
 */
final readonly class NoEmptyArrayAssignmentRule implements Rule
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
        return Assign::class;
    }

    /**
     * @param Assign $node
     *
     * @throws ShouldNotHappenException
     *
     * @return list<IdentifierRuleError>
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $file = $scope->getFile();

        foreach ($this->excludedPaths as $excludedPath) {
            if (str_starts_with($file, $excludedPath) || str_contains($file, $excludedPath)) {
                return [];
            }
        }

        if (!$node->expr instanceof Array_ || [] !== $node->expr->items) {
            return [];
        }

        return [
            RuleErrorBuilder::message('Assigning an empty array [] is forbidden, use TournayreLabs\\Primitives\\Collection::of([]) instead.')
                ->identifier('tournayrelabs.noEmptyArrayAssignment')
                ->build(),
        ];
    }
}
