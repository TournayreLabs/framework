<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Stmt\Foreach_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rule<Foreach_>
 */
final readonly class NoForeachRule implements Rule
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
        return Foreach_::class;
    }

    /**
     * @param Foreach_ $node
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

        return [
            RuleErrorBuilder::message('Calling foreach() is forbidden, use TournayreLabs\\Primitives\\Collection instead.')
                ->identifier('tournayrelabs.noForeach')
                ->build(),
        ];
    }
}
