# Coding Standards

## PHP and Laravel

- PHP 8.3 syntax is allowed; do not require a newer runtime.
- Follow Laravel Pint's `laravel` preset.
- Use strict, descriptive names and explicit return types where practical.
- Use dependency injection rather than service location in domain code.
- Validate untrusted input and authorize protected actions.
- Avoid raw SQL unless query builder or Eloquent cannot express the requirement clearly.
- Prevent N+1 queries with eager loading and tests where risk is meaningful.
- Do not put secrets or environment-specific values in source.

## React

- Use functional components and hooks.
- Keep components accessible and keyboard operable.
- Avoid premature global state.
- Handle loading, empty and error states explicitly.
- Do not suppress hook dependency warnings without a documented reason.

## Tailwind

- Prefer utilities and reusable components over large custom CSS blocks.
- Preserve readable class grouping: layout, spacing, typography, visuals, state.
- Add custom theme values only when they represent a repeated design token.

## Dependencies

A new dependency needs a clear reason, maintenance assessment and test coverage for the integration. Prefer built-in Laravel, browser and language capabilities.
