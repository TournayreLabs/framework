<?php

declare(strict_types=1);

namespace TournayreLabs\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;

/**
 * @implements Rule<Name>
 */
final readonly class NoForbiddenLoggerInterfaceRule implements Rule
{
    /**
     * @param array<string> $excludedPaths
     * @param array<string> $forbiddenNames
     */
    public function __construct(
        private array $excludedPaths = [],
        private array $forbiddenNames = [
            'Psr\\Log\\LoggerInterface',
            'Symfony\\Component\\HttpKernel\\Log\\LoggerInterface',
        ],
    ) {
    }

    public function getNodeType(): string
    {
        return Name::class;
    }

    /**
     * @param Name $node
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

        if (!in_array($node->toString(), $this->forbiddenNames, true)) {
            return [];
        }

        return [
            RuleErrorBuilder::message('use TournayreLabs\\Contracts\\Log\\LoggerInterface instead')
                ->identifier('tournayrelabs.noForbiddenLoggerInterface')
                ->build(),
        ];
    }
}
