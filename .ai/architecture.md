# Architecture

## Runtime boundaries

- Nginx is the HTTP entry point and proxies PHP requests to PHP-FPM.
- Laravel owns routing, validation, authorization, persistence and server-rendered application shell.
- React mounts into the Blade shell and is built by Vite.
- MySQL is the primary relational store.
- Redis is available for cache, queues and coordination.
- Mailpit captures local email.
- phpMyAdmin is a local-only database utility.

## Source of truth

- Runtime versions and services: `compose.yaml` and `docker/**`.
- PHP dependencies: `composer.json` and `composer.lock`.
- Frontend dependencies: `package.json` and `package-lock.json`.
- Environment contract: `.env.example`.
- Quality gates: `Makefile` and `.github/workflows/ci.yml`.

## Application design

- Controllers translate HTTP input/output and stay thin.
- Form Requests own non-trivial validation and authorization.
- Domain actions/services own business workflows.
- Eloquent models own relationships, casts and local invariants, not large workflows.
- React components remain focused; extract reusable behavior into hooks only when reuse is real.

## Change boundaries

Feature tasks should normally touch `app/`, `resources/`, `routes/`, `database/` and `tests/`. Infrastructure files are protected and require explicit scope.
