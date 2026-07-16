# Testing Rules

- Use Pest for PHP tests.
- Prefer feature tests for HTTP behavior, authorization, validation and persistence.
- Use unit tests for isolated domain logic with meaningful branching.
- Every bug fix should include a regression test when practical.
- Tests must be deterministic and independent of external network services.
- Use factories instead of hand-building large model graphs.
- Assert outcomes and externally observable behavior, not implementation details.
- Frontend changes must at minimum pass ESLint, Prettier and Vite build.

Required baseline:

```bash
make lint
make test
make build-assets
```

For cross-cutting changes, run `make quality`.
