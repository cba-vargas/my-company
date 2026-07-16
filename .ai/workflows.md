# Development Workflows

## Feature

1. Inspect routes, model boundaries and existing tests.
2. Add or update a failing Pest test.
3. Implement the smallest coherent change.
4. Run Pint, Pest, ESLint, Prettier and Vite build as relevant.
5. Summarize changed files, behavior and validation.

## Bug fix

1. Reproduce and capture the failure in a regression test.
2. Fix root cause rather than suppressing symptoms.
3. Check adjacent behavior for regressions.

## Infrastructure

1. Require explicit task scope.
2. Update architecture and Docker rules if decisions change.
3. Validate Compose configuration and service health.
4. Provide migration and rollback instructions.
