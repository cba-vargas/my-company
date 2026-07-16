# Codex Instructions

## Read first

Read `.ai/architecture.md`, `.ai/coding-standards.md`, `.ai/testing-rules.md` and `.ai/docker-rules.md` before editing.

## Operating rules

1. Establish the task boundary and inspect existing implementation before changing code.
2. Make minimal, focused changes; do not refactor unrelated areas.
3. Preserve Laravel conventions and the React/Vite integration.
4. Add or update Pest tests for behavioral changes.
5. Do not modify protected infrastructure unless directly requested.
6. Do not expose secrets, copy `.env` values into source, or commit tokens.
7. Report changed files and commands actually executed.

## Protected infrastructure

- `compose.yaml`
- `docker/**`
- `.github/workflows/**`
- `.mcp/**`
- `.env.example`

Infrastructure changes must include impact, rollback and verification.

## Definition of done

A normal task is done only after the relevant subset of these checks passes:

```bash
make lint
make test
make build-assets
```

Never invent command results.
