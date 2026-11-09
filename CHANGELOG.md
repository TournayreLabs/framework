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
