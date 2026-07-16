#!/usr/bin/env bash
set -u

fail=0
check() {
  local label="$1"
  shift
  if "$@" >/dev/null 2>&1; then
    printf '✓ %s\n' "$label"
  else
    printf '✗ %s\n' "$label"
    fail=1
  fi
}

check "Docker" docker --version
check "Docker Compose v2" docker compose version
check "Compose configuration" docker compose config
check "Application health" docker compose exec -T nginx wget -qO- http://127.0.0.1/up
check "Mailpit container" docker compose exec -T mailpit /mailpit --version
check "MySQL health" docker compose exec -T mysql sh -c 'mysqladmin ping -h 127.0.0.1 -uroot -p"$MYSQL_ROOT_PASSWORD" --silent'
check "Redis health" docker compose exec -T redis redis-cli ping

exit "$fail"
