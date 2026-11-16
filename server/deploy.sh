#!/usr/bin/env bash
set -e

BASE_DIR="${1:-$(pwd)/..}"
SERVER_DIR="$BASE_DIR/server"
PUBLIC_DIR="$BASE_DIR/public_html"

echo "==> Deploying to SERVER: $SERVER_DIR and PUBLIC: $PUBLIC_DIR"

cd "$SERVER_DIR"

echo "==> Step 1: Configuring environment (.env)..."
if [ ! -f .env ]; then
  if [ -f "$BASE_DIR/.env" ]; then
    cp "$BASE_DIR/.env" .env
  else
    cp .env.example .env
  fi
fi

# Ensure SQLite database exists if using sqlite
mkdir -p database
if [ ! -f database/database.sqlite ]; then
  if [ -f "$BASE_DIR/database/database.sqlite" ]; then
    cp "$BASE_DIR/database/database.sqlite" database/database.sqlite
  else
    touch database/database.sqlite
  fi
  chmod 664 database/database.sqlite
fi

# Detect PHP & Composer path
PHP_BIN="php"
if [ -x "/opt/alt/php84/usr/bin/php" ]; then
  PHP_BIN="/opt/alt/php84/usr/bin/php"
elif [ -x "/opt/alt/php83/usr/bin/php" ]; then
  PHP_BIN="/opt/alt/php83/usr/bin/php"
elif [ -x "/opt/ecp-php84/bin/php" ]; then
  PHP_BIN="/opt/ecp-php84/bin/php"
elif [ -x "/usr/bin/php8.4" ]; then
  PHP_BIN="/usr/bin/php8.4"
elif [ -x "/usr/bin/php8.3" ]; then
  PHP_BIN="/usr/bin/php8.3"
elif [ -x "/usr/local/bin/php" ]; then
  PHP_BIN="/usr/local/bin/php"
fi

COMPOSER_BIN="composer"
if [ -x "/usr/bin/composer" ]; then
  COMPOSER_BIN="/usr/bin/composer"
elif [ -x "/usr/local/bin/composer" ]; then
  COMPOSER_BIN="/usr/local/bin/composer"
fi

echo "==> Step 2: Installing Composer dependencies with $PHP_BIN..."
$PHP_BIN $COMPOSER_BIN install --no-dev --prefer-dist --optimize-autoloader --no-interaction --ignore-platform-req=php+

echo "==> Step 3: Generating application key (if needed)..."
if ! grep -q "APP_KEY=base64:" .env; then
  $PHP_BIN artisan key:generate --force
fi

echo "==> Step 4: Ensuring storage symlink in public_html..."
mkdir -p storage/app/public
ln -sfn ../server/storage/app/public "$PUBLIC_DIR/storage" 2>/dev/null || true
$PHP_BIN artisan storage:link 2>/dev/null || true

echo "==> Step 5: Running database migrations..."
$PHP_BIN artisan migrate --force || echo "Notice: Database migrations skipped."

echo "==> Step 6: Optimizing caches..."
$PHP_BIN artisan optimize:clear || true
$PHP_BIN artisan optimize || true

# Clean up duplicate root files if server/ is ready
if [ -d "$SERVER_DIR/app" ] && [ -d "$BASE_DIR/app" ]; then
  echo "==> Step 7: Cleaning up old root-level application files..."
  rm -rf "$BASE_DIR/app" "$BASE_DIR/bootstrap" "$BASE_DIR/config" "$BASE_DIR/database" "$BASE_DIR/resources" "$BASE_DIR/routes" "$BASE_DIR/storage" "$BASE_DIR/vendor" "$BASE_DIR/artisan" "$BASE_DIR/composer.json" "$BASE_DIR/composer.lock" "$BASE_DIR/public" 2>/dev/null || true
fi

echo "==> [SUCCESS] Deployment to server/ and public_html/ completed successfully!"
