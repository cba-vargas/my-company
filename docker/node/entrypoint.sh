#!/bin/sh
set -eu

cd /var/www/html

APP_UID="${APP_UID:-1000}"
APP_GID="${APP_GID:-1000}"

mkdir -p node_modules /tmp/.npm
chown -R "${APP_UID}:${APP_GID}" node_modules /tmp/.npm

fingerprint() {
  {
    sha256sum package.json
    if [ -f package-lock.json ]; then
      sha256sum package-lock.json
    fi
  } | sha256sum | awk '{print $1}'
}

current_hash="$(fingerprint)"
installed_hash="$(cat node_modules/.starter-package-hash 2>/dev/null || true)"

if [ ! -x node_modules/.bin/vite ] || [ "$current_hash" != "$installed_hash" ]; then
  echo "[starter] Installing Node dependencies..."
  su-exec "${APP_UID}:${APP_GID}" npm install --no-audit --no-fund
  fingerprint > node_modules/.starter-package-hash
  chown "${APP_UID}:${APP_GID}" node_modules/.starter-package-hash
fi

exec su-exec "${APP_UID}:${APP_GID}" "$@"
