#!/usr/bin/env bash
set -Eeuo pipefail

cd /var/www/html

mkdir -p \
  bootstrap/cache \
  storage/app/private \
  storage/app/public \
  storage/framework/cache/data \
  storage/framework/sessions \
  storage/framework/testing \
  storage/framework/views \
  storage/logs \
  vendor \
  /home/app/.composer/cache

chown -R app:app bootstrap/cache storage vendor /home/app/.composer

if [[ ! -f .env && -f .env.example ]]; then
  gosu app cp .env.example .env
fi

composer_fingerprint() {
  {
    sha256sum composer.json
    if [[ -f composer.lock ]]; then
      sha256sum composer.lock
    fi
  } | sha256sum | awk '{print $1}'
}

CURRENT_COMPOSER_HASH="$(composer_fingerprint)"
INSTALLED_COMPOSER_HASH="$(cat vendor/.starter-composer-hash 2>/dev/null || true)"

if [[ ! -f vendor/autoload.php || "${CURRENT_COMPOSER_HASH}" != "${INSTALLED_COMPOSER_HASH}" ]]; then
  echo "[starter] Installing PHP dependencies..."
  gosu app composer install --no-interaction --prefer-dist --optimize-autoloader
  composer_fingerprint > vendor/.starter-composer-hash
  chown app:app vendor/.starter-composer-hash
fi

if [[ -f artisan ]]; then
  if ! grep -Eq '^APP_KEY=base64:.+' .env 2>/dev/null; then
    echo "[starter] Generating application key..."
    gosu app php artisan key:generate --force --no-interaction
  fi

  gosu app php artisan storage:link --no-interaction >/dev/null 2>&1 || true

  if [[ "${AUTO_MIGRATE:-true}" == "true" ]]; then
    echo "[starter] Waiting for database..."
    attempts=0
    until gosu app php artisan db:show --no-interaction >/dev/null 2>&1; do
      attempts=$((attempts + 1))
      if [[ ${attempts} -ge 30 ]]; then
        echo "[starter] Database did not become ready in time." >&2
        exit 1
      fi
      sleep 2
    done

    echo "[starter] Running migrations..."
    gosu app php artisan migrate --force --no-interaction
  fi
fi

exec "$@"
