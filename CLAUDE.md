# Claude Code Instructions

## Project intent

This repository is a reusable Laravel starter. Docker infrastructure is intentionally standardized once so Claude Code can focus on feature development rather than regenerating environment configuration.

## Required reading

Read `.ai/architecture.md`, `.ai/coding-standards.md`, `.ai/testing-rules.md`, `.ai/docker-rules.md` and `.ai/mcp-policy.md` before making broad changes.

## Workflow

- Inspect relevant files and tests before editing.
- State assumptions when requirements are incomplete.
- Keep diffs focused and reversible.
- Prefer Laravel conventions and existing abstractions.
- Add tests with each behavior change.
- Run the relevant quality commands and report actual results.

## Infrastructure boundary

Do not edit `compose.yaml`, `docker/**`, `.github/workflows/**`, `.mcp/**` or `.env.example` during ordinary feature work. An explicit infrastructure task must include risk, compatibility, rollback and validation.

## Commands

```bash
make lint
make test
make build-assets
make quality
```

Do not disable tests or lint rules merely to make a change pass.
