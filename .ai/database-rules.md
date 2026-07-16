# Database Rules

- Every schema change is made through a migration.
- Migrations require a safe `down()` path unless the operation is intentionally irreversible and documented.
- Add indexes for new lookup, ordering and join patterns.
- Avoid destructive changes in the same deployment that removes application compatibility.
- Use transactions for multi-step writes that must remain atomic.
- Prevent mass-assignment and authorization vulnerabilities.
- Tests use SQLite in memory by default; database-specific behavior needs a dedicated MySQL integration test strategy.
