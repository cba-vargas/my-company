#!/usr/bin/env bash
set -Eeuo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "${ROOT_DIR}"

if ! command -v docker >/dev/null 2>&1; then
  echo "Docker is required but was not found." >&2
  exit 1
fi

if ! docker compose version >/dev/null 2>&1; then
  echo "Docker Compose v2 is required." >&2
  exit 1
fi

if [[ ! -f .env ]]; then
  cp .env.example .env
fi

LOCAL_UID="$(id -u 2>/dev/null || echo 1000)"
LOCAL_GID="$(id -g 2>/dev/null || echo 1000)"

set_env_value() {
  local key="$1"
  local value="$2"
  local temporary
  temporary="$(mktemp)"

  awk -v key="${key}" -v value="${value}" '
    BEGIN { updated = 0 }
    index($0, key "=") == 1 { print key "=" value; updated = 1; next }
    { print }
    END { if (!updated) print key "=" value }
  ' .env > "${temporary}"

  mv "${temporary}" .env
}

set_env_value UID "${LOCAL_UID}"
set_env_value GID "${LOCAL_GID}"

echo "[starter] Validating Compose configuration..."
docker compose config >/dev/null

echo "[starter] Building and starting services..."
docker compose up -d --build

echo "[starter] Waiting for application health..."
for ((attempt = 1; attempt <= 60; attempt++)); do
  if docker compose exec -T nginx wget -qO- http://127.0.0.1/up >/dev/null 2>&1; then
    APP_PORT_VALUE="$(awk -F= '$1 == "APP_PORT" { print $2; exit }' .env)"
    MAILPIT_PORT_VALUE="$(awk -F= '$1 == "MAILPIT_PORT" { print $2; exit }' .env)"
    PHPMYADMIN_PORT_VALUE="$(awk -F= '$1 == "PHPMYADMIN_PORT" { print $2; exit }' .env)"

    echo ""
    echo "Starter is ready:"
    echo "  App:        http://localhost:${APP_PORT_VALUE:-8080}"
    echo "  Mailpit:    http://localhost:${MAILPIT_PORT_VALUE:-8025}"
    echo "  phpMyAdmin: http://localhost:${PHPMYADMIN_PORT_VALUE:-8081}"
    exit 0
  fi
  sleep 2
done

echo "Application health check failed. Run: docker compose logs" >&2
exit 1
