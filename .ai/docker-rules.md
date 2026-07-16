# Docker Rules

## Principle

Docker configuration is designed and reviewed as infrastructure, not regenerated opportunistically by AI agents.

## Protected files

- `compose.yaml`
- `docker/**`
- `.env.example`
- `.github/workflows/**` when runtime behavior changes

## Agent restrictions

During feature work, do not:

- Change base images or runtime versions.
- Add services, networks, volumes or exposed ports.
- Move Node into the PHP image or PHP into the Node image.
- Replace Nginx, MySQL, Redis, Mailpit or phpMyAdmin.
- Change file ownership strategy, entrypoints or health checks.
- Add production behavior to the local development compose file.

An explicit infrastructure task must document:

1. Motivation and affected developers/services.
2. Backward compatibility and migration steps.
3. Security implications.
4. Rollback plan.
5. `docker compose config` result and health checks.

## Local versus production

The provided Compose stack is for development. Production needs a separate, reviewed deployment design with immutable images, TLS, secret management, backups and observability.
