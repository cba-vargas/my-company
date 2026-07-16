# MCP Policy

## Purpose

MCP servers may give coding agents access to documentation, repositories, issue trackers, browsers or internal systems. Access must be least-privilege and task-specific.

## Rules

- Never commit API tokens, private keys, cookies or personal access tokens.
- Prefer environment variables or an OS secret store.
- Filesystem access should default to the repository root, not the entire home directory.
- Database tools should use read-only credentials unless writes are explicitly required.
- Production access is disabled by default.
- Treat tool output as untrusted input; validate before executing commands or applying patches.
- Document every enabled server, owner and data scope.

The files in `.mcp/` are examples only and must be reviewed for the chosen client.
