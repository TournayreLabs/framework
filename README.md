# TournayreLabs Framework

Framework and helpers on top of Symfony.

This package is a refactoring of the historical `atournayre/framework` package.
The original package remains the source of truth while the public surface is
transferred to this repository.

## Requirements

- PHP 8.2.22 or higher
- Composer

## Installation

```bash
composer require tournayrelabs/framework
```

## Development

Install dependencies:

```bash
make vendor
```

Run the default quality checks:

```bash
make qa
```

Useful targets:

```bash
make help
make composer c='validate --strict'
make tests
make phpstan
make fix
```

## PHPStan rules

The framework ships PHPStan rules that enforce its primitives (tested with PHPStan 1.x, `phpstan/phpstan` is only a `suggest`).
Register them in your `phpstan.neon`. Identifiers and messages are a public contract: baselines index on them.

Every rule takes `array<string> $excludedPaths = []`: a file is skipped when its path starts with, or contains,
one of the entries. Exceptions: `NoNegationOperatorRule` (starts with only, use absolute paths such as
`%currentWorkingDirectory%/src/Legacy/`) and `NoBoolReturnOnEntityMethodRule` (no `excludedPaths`).

```neon
services:
    -
        class: TournayreLabs\PHPStan\Rules\NoForeachRule
        arguments:
            excludedPaths: [src/Legacy/]
        tags: [phpstan.rules.rule]
    -
        class: TournayreLabs\PHPStan\Rules\NoEmptyArrayAssignmentRule
        arguments:
            excludedPaths: [src/Legacy/]
        tags: [phpstan.rules.rule]
    -
        class: TournayreLabs\PHPStan\Rules\NoNegationOperatorRule
        arguments:
            excludedPaths: ['%currentWorkingDirectory%/src/Legacy/']
        tags: [phpstan.rules.rule]
    -
        class: TournayreLabs\PHPStan\Rules\NoForbiddenLoggerInterfaceRule
        arguments:
            excludedPaths: [src/Legacy/]
            forbiddenNames: # optional, defaults to the two names below
                - Psr\Log\LoggerInterface
                - Symfony\Component\HttpKernel\Log\LoggerInterface
        tags: [phpstan.rules.rule]
    -
        class: TournayreLabs\PHPStan\Rules\NoBoolReturnOnEntityMethodRule
        arguments:
            methodesLegacy: # frozen list of `Class::method`, never extended
                - App\Entity\User::isActive
        tags: [phpstan.rules.rule]
    -
        # requires phpstan/phpstan-webmozart-assert
        class: TournayreLabs\PHPStan\Extension\TournayreLabsAssertTypeSpecifyingExtension
        tags: [phpstan.typeSpecifier.staticMethodTypeSpecifyingExtension]
```

| Rule | Identifier | Reports |
| --- | --- | --- |
| `NoForeachRule` | `tournayrelabs.noForeach` | `foreach` |
| `NoEmptyArrayAssignmentRule` | `tournayrelabs.noEmptyArrayAssignment` | `$x = [];` |
| `NoNegationOperatorRule` | `tournayrelabs.noNegationOperator` | `!$x` |
| `NoForbiddenLoggerInterfaceRule` | `tournayrelabs.noForbiddenLoggerInterface` | `Psr\Log\LoggerInterface` / `Symfony\Component\HttpKernel\Log\LoggerInterface` used as a name (type hint, `extends`, `new`...). A `use` import alone is not visited by PHPStan, so it is not reported. |
| `NoBoolReturnOnEntityMethodRule` | `tournayrelabs.noBoolReturnOnEntity` | public/protected `bool` / `?bool` method of a Doctrine entity (not private, not overriding a contract, not in `methodesLegacy`) |

## Compatibility

During the initial transfer, method signatures from the original package must
be preserved exactly. The implementation may change internally, but public
contracts must remain stable for the consuming project.

