---
applyTo: "compose.yaml,docker/**,.github/workflows/**,.mcp/**,.env.example"
---

These files define protected infrastructure. Do not modify them as a side effect of feature work. Changes require explicit scope, compatibility notes, rollback steps and validation with `docker compose config` plus relevant health checks.
