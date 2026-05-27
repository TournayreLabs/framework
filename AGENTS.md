# AGENTS.md

This repository enforces strict rules for any AI agent (Codex, Cursor, Copilot-like, etc.).

## Source of authority

- This file defines the general framework.
- Detailed rules live in `.ai/rules/`.
- In case of conflict, the priority order is:
  1. Explicit user request in the session
  2. `AGENTS.md`
  3. Files in `.ai/rules/`

## Minimum agent commitment

Before any code modification, the agent must:

1. Read `AGENTS.md`.
2. Read all files in `.ai/rules/`.
3. Apply these rules without exception.

If a rule is not clear, the agent must stop and ask for clarification before editing.

## Non-negotiable architecture rule

The style of this project is declarative, object/collection-oriented.

It is forbidden to introduce imperative patterns that bypass this style, including:

- guard `if` statements in `each()` callbacks to simulate filtering,
- loops/branches that replace an existing `filterWith()/map()/values()` pipeline,
- changes that degrade business readability of collections.

If filtering is required, it must be expressed explicitly with `filterWith()` (or a project declarative equivalent), then transformed via `map()`.

## Evidence policy before delivery

Any proposed fix must be validated locally:

- `make phpstan`
- `make fix-check`

If either fails, the task is not considered complete.

## Commits

Unless explicitly requested, the agent does not commit automatically.
