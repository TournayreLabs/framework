# Changelog

## Unreleased

### Added

- PHPStan rules enforcing the framework primitives (identifiers and messages are a public contract):
  - `TournayreLabs\PHPStan\Rules\NoEmptyArrayAssignmentRule` (`tournayrelabs.noEmptyArrayAssignment`), argument `excludedPaths`.
  - `TournayreLabs\PHPStan\Rules\NoNegationOperatorRule` (`tournayrelabs.noNegationOperator`), argument `excludedPaths` (prefix match only).
  - `TournayreLabs\PHPStan\Rules\NoForbiddenLoggerInterfaceRule` (`tournayrelabs.noForbiddenLoggerInterface`), arguments `excludedPaths`, `forbiddenNames`.
  - `TournayreLabs\PHPStan\Rules\NoBoolReturnOnEntityMethodRule` (`tournayrelabs.noBoolReturnOnEntity`), argument `methodesLegacy`.
  - `TournayreLabs\PHPStan\Extension\TournayreLabsAssertTypeSpecifyingExtension` (requires `phpstan/phpstan-webmozart-assert`).
- Unit test for `NoForeachRule` (`tournayrelabs.noForeach`, unchanged).
- `suggest`: `phpstan/phpstan`, `phpstan/phpstan-webmozart-assert`.

### Changed

- Dev toolchain moved to PHPStan 2 (`phpstan/phpstan` and `phpstan-*` extensions, `spaze/phpstan-disallowed-calls` 4,
  `atournayre/phpstan-elegant-object` 1.0, `rector/rector` 2, `tomasvotruba/unused-public` 2).
  Findings new to PHPStan 2 on existing code are frozen in `tools/phpstan/baseline-phpstan2.neon`.
