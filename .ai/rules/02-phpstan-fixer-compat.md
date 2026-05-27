# 02 - PHPStan / PHP-CS-Fixer compatibility

## Goal

Avoid fixes that make PHPStan pass but fail formatting (or the reverse).

## Rules

1. Do not rely on fragile inline annotations if they are rewritten by the fixer.

2. Prefer:
   - explicit narrowing through collection API,
   - precise callback signatures,
   - typed private methods.

3. After PHP modifications:
   - run `make phpstan`
   - run `make fix-check`

4. If tools conflict:
   - revisit code design,
   - do not introduce a local hack that violates the architecture.
