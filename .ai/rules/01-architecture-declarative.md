# 01 - Declarative architecture

## Goal

Preserve a consistent style based on business objects and declarative collections.

## Rules

1. Prefer collection pipelines:
   - `filterWith(...)`
   - `map(...)`
   - `values()`
   - `toArray()` only at output when needed

2. Do not use `each()` for filtering.

3. Avoid `if` statements in collection callbacks when they compensate for missing `filterWith()`.

4. Prefer extracting a typed private method over complex inline logic.

5. Any typing fix must preserve business intent, not only "make the static tool pass".
