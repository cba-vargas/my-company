# GitHub Copilot Instructions

## Required context

Before proposing changes, read the relevant files in `.ai/`, especially `architecture.md`, `coding-standards.md`, `testing-rules.md` and `docker-rules.md`.

## Scope

- Focus on application features, tests, refactoring and documentation.
- Follow existing Laravel, React and Tailwind conventions.
- Prefer the smallest coherent change that satisfies the task.
- Do not introduce a dependency when framework or existing code already solves the problem.

## Protected infrastructure

Do not edit `compose.yaml`, `docker/**`, `.github/workflows/**`, `.mcp/**` or `.env.example` unless the user explicitly requests an infrastructure change.

When an infrastructure change is requested, describe impact, migration steps, rollback and validation.

## Validation

For normal code changes, run or request the equivalent of:

```bash
make lint
make test
make build-assets
```

Never claim validation succeeded unless the commands actually ran successfully.

## Laravel

- Use Form Requests for non-trivial validation.
- Keep controllers thin; move business logic into focused actions/services.
- Protect mass assignment.
- Avoid N+1 queries and add indexes for new query patterns.
- Every schema change requires a migration and a rollback path.

## React

- Use functional components and hooks.
- Keep server state and UI state explicit.
- Maintain accessibility and keyboard behavior.
- Do not bypass ESLint to hide a design issue.

## Tests

Add or update Pest tests for behavior changes. Prefer feature tests for application behavior and unit tests for isolated domain logic.
