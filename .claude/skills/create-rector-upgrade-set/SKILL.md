---
name: create-rector-upgrade-set
description: Create or update a versioned Rector auto-upgrade set for this framework. Use when adding automated migration rules that help consumers move from atournayre/framework to tournayrelabs/framework or upgrade to a new framework version.
allowed-tools: Read, Write, Edit, Bash, Grep, Glob
---

# Create Rector Upgrade Set

Use this skill to create a Rector set consumed by `atournayre/rector-auto-upgrade`.

## Contract

The Composer plugin discovers upgrade sets in the installed package at:

```text
rector/sets/<target-version>.php
```

The filename must match the package version Composer reports after update. The file must return a standard Rector config closure.

## Workflow

1. Identify the target package version.
   - Prefer the exact version being prepared for release, for example `1.0.0`.
   - Create or update `rector/sets/<version>.php`.
2. Identify the migration intent.
   - Namespace rename: `Atournayre\` to `TournayreLabs\`.
   - Class/interface/trait/enum moves or removals.
   - Method renames, argument order changes, return type changes, or deprecations.
3. Inspect existing public compatibility tests before changing rules.
   - Read `tests/Fixtures/public-signatures.json`.
   - Read `tests/Unit/PublicSignatureCompatibilityTest.php`.
4. Implement the smallest Rector ruleset that performs the migration.
   - Prefer built-in Rector rules when available.
   - Add custom rules only if built-in rules cannot express the migration.
5. Validate locally.
   - `vendor/bin/rector process --config rector/sets/<version>.php --dry-run`
   - `composer validate --strict`
   - `make tests`
6. Report remaining manual steps for the consumer project.

## Template

Start from `templates/rector-set.php` and replace:

- `{{VERSION}}` with the target version
- example mappings with real migration mappings

Keep sets deterministic and idempotent. A set must be safe to run more than once.
