# Automated PHP & Laravel CI/CD Deployment Guide (GitHub Actions + SSH)

This comprehensive guide covers automated deployments for **any PHP project** via **GitHub Actions** and **SSH/Rsync**.

---

## 🧭 Project Type Decision Guide

Choose the deployment model based on your project type:

| Project Type | Where Files Go | Architecture |
|---|---|---|
| **Simple / Core PHP / HTML / WordPress / CodeIgniter** | All files &rarr; `public_html/` | **[Option A: Direct to `public_html`](#option-a-standard--simple-php-site-direct-to-public_html)** |
| **Laravel / Symfony / Modern Framework** | Public &rarr; `public_html/`<br>Backend &rarr; `server/` | **[Option B: Split Framework Architecture](#option-b-laravel--framework-site-split-server--public_html)** |

---

## 🔑 Common Step: Generate SSH Deployment Key on Server (One-Time)

Both Option A and Option B require this one-time setup on your server:

```bash
# 1. Connect to your server
ssh username@your-server-ip -p 22

# 2. Create .ssh directory with proper permissions
mkdir -p ~/.ssh && chmod 700 ~/.ssh

# 3. Generate an ED25519 deployment key
ssh-keygen -t ed25519 -N "" -f ~/.ssh/github_actions -C "github-actions-deploy"

# 4. Authorize the key
cat ~/.ssh/github_actions.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys

# 5. Display the private key to copy to GitHub
cat ~/.ssh/github_actions
```

### Add GitHub Secrets:
In your GitHub repo &rarr; **Settings** &rarr; **Secrets and variables** &rarr; **Actions**:
- `SSH_HOST`: Server IP or hostname (e.g. `45.199.139.25`)
- `SSH_USER`: SSH username (e.g. `runwayho1`)
- `SSH_PORT`: SSH port (`22`, or `65002` on Hostinger)
- `TARGET_DIR`: Hosting root path (e.g. `/var/www/site-uuid` or `/home/username`)
- `SSH_PRIVATE_KEY`: The entire output of `cat ~/.ssh/github_actions` (including `BEGIN` and `END` lines)

---

# Option A: Standard / Simple PHP Site (Direct to `public_html`)

Use this for **plain PHP**, **procedural sites**, **HTML/CSS/JS sites**, **WordPress**, or any project where all files belong in the web root.

### Folder Layout on Server:
```text
/var/www/your-site/ (or /home/username/)
└── public_html/             <-- All files live directly here!
    ├── index.php
    ├── about.php
    ├── contact.php
    ├── css/
    ├── js/
    ├── images/
    ├── includes/
    ├── .htaccess
    └── config.php (or .env)
```

### GitHub Actions Workflow: `.github/workflows/deploy.yml`

Create this file in your project:

```yaml
name: Deploy Simple PHP Site

on:
  push:
    branches:
      - main
  workflow_dispatch:

jobs:
  deploy:
    name: Deploy to public_html
    runs-on: ubuntu-latest

    steps:
      - name: 1. Checkout Repository
        uses: actions/checkout@v4

      - name: 2. Setup SSH Key
        env:
          SSH_PRIVATE_KEY: ${{ secrets.SSH_PRIVATE_KEY }}
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
        run: |
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"

          mkdir -p ~/.ssh
          echo "$SSH_PRIVATE_KEY" | tr -d '\r' > ~/.ssh/deploy_key
          chmod 600 ~/.ssh/deploy_key
          ssh-keyscan -p "$CLEAN_PORT" "$CLEAN_HOST" >> ~/.ssh/known_hosts 2>/dev/null || true

      - name: 3. Sync Directly to public_html via Rsync
        env:
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_USER: ${{ secrets.SSH_USER }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
          TARGET_DIR: ${{ secrets.TARGET_DIR }}
        run: |
          CLEAN_USER=$(echo "${SSH_USER}" | awk -F'@' '{print $1}' | awk '{print $NF}' | tr -dc 'a-zA-Z0-9_-')
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"
          CLEAN_DIR=$(echo "${TARGET_DIR}" | tr -d '\r\n" ')

          # Ensure public_html directory exists
          ssh -p "$CLEAN_PORT" -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no "$CLEAN_USER@$CLEAN_HOST" \
            "mkdir -p $CLEAN_DIR/public_html"

          # Sync repository directly into public_html
          rsync -avz --delete \
            -e "ssh -p $CLEAN_PORT -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no" \
            --exclude='.git/' \
            --exclude='.github/' \
            --exclude='.env' \
            --exclude='config.php' \
            --exclude='uploads/' \
            --exclude='tests/' \
            --exclude='*.log' \
            ./ "$CLEAN_USER@$CLEAN_HOST:$CLEAN_DIR/public_html/"

      - name: 4. Set Permissions (Optional)
        env:
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_USER: ${{ secrets.SSH_USER }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
          TARGET_DIR: ${{ secrets.TARGET_DIR }}
        run: |
          CLEAN_USER=$(echo "${SSH_USER}" | awk -F'@' '{print $1}' | awk '{print $NF}' | tr -dc 'a-zA-Z0-9_-')
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"
          CLEAN_DIR=$(echo "${TARGET_DIR}" | tr -d '\r\n" ')

          ssh -p "$CLEAN_PORT" -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no "$CLEAN_USER@$CLEAN_HOST" \
            "chmod -R 755 $CLEAN_DIR/public_html"
```

---

# Option B: Laravel / Framework Site (Split `server/` + `public_html/`)

Use this for **Laravel**, **Symfony**, or frameworks with a dedicated `public/` folder where sensitive files (`.env`, `app/`, `storage/`, `database/`) must **NEVER** be publicly accessible via browser.

### Folder Layout on Server:
```text
/var/www/your-site/ (or /home/username/)
├── public_html/             <-- Web document root (served to visitors)
│   ├── index.php            (auto-configured to point to ../server)
│   ├── .htaccess
│   ├── build/               (compiled Vite assets)
│   ├── images/
│   ├── fonts/
│   └── storage -> ../server/storage/app/public
│
└── server/                  <-- Application backend (outside web root)
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    ├── artisan
    ├── composer.json
    ├── deploy.sh
    └── .env
```

---

### Step B.1: Create Server Deployment Script (`deploy.sh`)

Place `deploy.sh` in the root of your Laravel project:

```bash
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
if [ -x "/opt/ecp-php84/bin/php" ]; then
  PHP_BIN="/opt/ecp-php84/bin/php"
elif [ -x "/usr/bin/php8.4" ]; then
  PHP_BIN="/usr/bin/php8.4"
elif [ -x "/usr/bin/php8.3" ]; then
  PHP_BIN="/usr/bin/php8.3"
fi

COMPOSER_BIN="composer"
if [ -x "/usr/bin/composer" ]; then
  COMPOSER_BIN="/usr/bin/composer"
fi

echo "==> Step 2: Installing Composer dependencies..."
$PHP_BIN $COMPOSER_BIN install --no-dev --prefer-dist --optimize-autoloader --no-interaction

echo "==> Step 3: Generating application key (if needed)..."
if ! grep -q "APP_KEY=base64:" .env; then
  $PHP_BIN artisan key:generate --force
fi

echo "==> Step 4: Ensuring storage symlink in public_html..."
mkdir -p storage/app/public
ln -sfn ../server/storage/app/public "$PUBLIC_DIR/storage"
$PHP_BIN artisan storage:link || true

echo "==> Step 5: Running database migrations..."
$PHP_BIN artisan migrate --force || echo "Notice: Database migrations skipped."

echo "==> Step 6: Optimizing caches..."
$PHP_BIN artisan optimize:clear
$PHP_BIN artisan optimize

# Clean up duplicate root files if server/ is ready
if [ -d "$SERVER_DIR/app" ] && [ -d "$BASE_DIR/app" ]; then
  echo "==> Step 7: Cleaning up old root-level application files..."
  rm -rf "$BASE_DIR/app" "$BASE_DIR/bootstrap" "$BASE_DIR/config" "$BASE_DIR/database" "$BASE_DIR/resources" "$BASE_DIR/routes" "$BASE_DIR/storage" "$BASE_DIR/vendor" "$BASE_DIR/artisan" "$BASE_DIR/composer.json" "$BASE_DIR/composer.lock" "$BASE_DIR/public" 2>/dev/null || true
fi

echo "==> [SUCCESS] Deployment to server/ and public_html/ completed successfully!"
```

---

### Step B.2: Create GitHub Actions Workflow (`.github/workflows/deploy.yml`)

Place this in `.github/workflows/deploy.yml`:

```yaml
name: Deploy to Production

on:
  push:
    branches:
      - main
  workflow_dispatch:

jobs:
  deploy:
    name: Build and Deploy
    runs-on: ubuntu-latest

    steps:
      - name: 1. Checkout Repository
        uses: actions/checkout@v4

      - name: 2. Setup Node.js
        uses: actions/setup-node@v4
        with:
          node-version: 22
          cache: 'npm'

      - name: 3. Install NPM Dependencies & Build Assets (Vite)
        run: |
          npm ci
          npm run build

      - name: 4. Setup SSH Key
        env:
          SSH_PRIVATE_KEY: ${{ secrets.SSH_PRIVATE_KEY }}
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
        run: |
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"

          mkdir -p ~/.ssh
          echo "$SSH_PRIVATE_KEY" | tr -d '\r' > ~/.ssh/deploy_key
          chmod 600 ~/.ssh/deploy_key
          ssh-keyscan -p "$CLEAN_PORT" "$CLEAN_HOST" >> ~/.ssh/known_hosts 2>/dev/null || true

      - name: 5. Prepare Deployment Distribution (server & public_html)
        run: |
          rm -rf deploy_dist
          mkdir -p deploy_dist/server
          mkdir -p deploy_dist/public_html

          # 1. Copy backend and application files into deploy_dist/server
          rsync -av \
            --exclude='.git/' \
            --exclude='.github/' \
            --exclude='node_modules/' \
            --exclude='public/' \
            --exclude='deploy_dist/' \
            --exclude='tests/' \
            ./ deploy_dist/server/

          # 2. Copy compiled public assets into deploy_dist/public_html
          rsync -av public/ deploy_dist/public_html/

          # 3. Patch public_html/index.php dynamically to load from ../server and set public path
          python3 -c "
          with open('deploy_dist/public_html/index.php', 'r') as f:
              c = f.read()
          c = c.replace(\"__DIR__.'/../\", \"__DIR__.'/../server/\")
          c = c.replace(\"\$app->handleRequest\", \"\$app->usePublicPath(__DIR__);\\n\\n\$app->handleRequest\")
          with open('deploy_dist/public_html/index.php', 'w') as f:
              f.write(c)
          "

      - name: 6. Sync Files to Server
        env:
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_USER: ${{ secrets.SSH_USER }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
          TARGET_DIR: ${{ secrets.TARGET_DIR }}
        run: |
          CLEAN_USER=$(echo "${SSH_USER}" | awk -F'@' '{print $1}' | awk '{print $NF}' | tr -dc 'a-zA-Z0-9_-')
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"
          CLEAN_DIR=$(echo "${TARGET_DIR}" | tr -d '\r\n" ')

          # Ensure remote directories exist and remove legacy symlink if needed
          ssh -p "$CLEAN_PORT" -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no "$CLEAN_USER@$CLEAN_HOST" \
            "[ -L $CLEAN_DIR/public_html ] && rm -f $CLEAN_DIR/public_html || true; mkdir -p $CLEAN_DIR/server $CLEAN_DIR/public_html"

          # 1. Sync server/ folder (protecting .env, database, uploads, and logs)
          rsync -avz --delete \
            -e "ssh -p $CLEAN_PORT -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no" \
            --exclude='.env' \
            --exclude='database/*.sqlite*' \
            --exclude='storage/app/public/*' \
            --exclude='storage/*.key' \
            --exclude='storage/logs/*' \
            --exclude='storage/framework/cache/data/*' \
            --exclude='storage/framework/sessions/*' \
            --exclude='storage/framework/views/*' \
            --exclude='vendor/' \
            --exclude='*.log' \
            deploy_dist/server/ "$CLEAN_USER@$CLEAN_HOST:$CLEAN_DIR/server/"

          # 2. Sync public_html/ folder (protecting storage symlink)
          rsync -avz --delete \
            -e "ssh -p $CLEAN_PORT -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no" \
            --exclude='storage' \
            deploy_dist/public_html/ "$CLEAN_USER@$CLEAN_HOST:$CLEAN_DIR/public_html/"

      - name: 7. Execute Server Post-Deployment
        env:
          SSH_HOST: ${{ secrets.SSH_HOST }}
          SSH_USER: ${{ secrets.SSH_USER }}
          SSH_PORT: ${{ secrets.SSH_PORT }}
          TARGET_DIR: ${{ secrets.TARGET_DIR }}
        run: |
          CLEAN_USER=$(echo "${SSH_USER}" | awk -F'@' '{print $1}' | awk '{print $NF}' | tr -dc 'a-zA-Z0-9_-')
          CLEAN_HOST=$(echo "${SSH_HOST}" | tr -d '\r\n" ' | awk -F'@' '{print $NF}')
          CLEAN_PORT=$(echo "${SSH_PORT:-22}" | tr -dc '0-9')
          [ -z "$CLEAN_PORT" ] && CLEAN_PORT="22"
          CLEAN_DIR=$(echo "${TARGET_DIR}" | tr -d '\r\n" ')

          ssh -p "$CLEAN_PORT" -i ~/.ssh/deploy_key -o StrictHostKeyChecking=no "$CLEAN_USER@$CLEAN_HOST" \
            "bash $CLEAN_DIR/server/deploy.sh $CLEAN_DIR"
```

---

## 🛡️ Critical Safety & Rsync Rules (DO NOT SKIP)

Whenever using `rsync --delete`:

> [!CAUTION]
> 1. **Never sync without excludes**: Without excludes, `--delete` will delete your `.env`, database, user-uploaded files, and `~/.ssh/authorized_keys`!
> 2. **Never overwrite `.ssh`**: In Option A, if syncing directly to `$TARGET_DIR`, always exclude `.ssh` or sync strictly to `$TARGET_DIR/public_html/`.
> 3. **Preserve User Uploads**:
>    - For simple PHP: Exclude `--exclude='uploads/'` or `--exclude='media/'`.
>    - For Laravel: Exclude `--exclude='storage/app/public/*'` and `--exclude='storage'` in `public_html/`.
> 4. **Keep Local Repo Clean**: Notice that `index.php` transformation is done only in CI/CD via Python on the runner. **Never commit server-specific paths to your Git repo**, so your local machine (`php artisan serve`) continues working smoothly!

---

## ⚡ Quick 5-Step Summary for Future Projects

1. **Check project type**:
   - Normal PHP &rarr; Use **Option A** workflow.
   - Laravel &rarr; Copy `deploy.sh` and use **Option B** workflow.
2. **Server SSH setup**: Generate key via `ssh-keygen` &rarr; add to `~/.ssh/authorized_keys`.
3. **GitHub Secrets**: Add `SSH_HOST`, `SSH_USER`, `SSH_PORT`, `TARGET_DIR`, `SSH_PRIVATE_KEY`.
4. **Push to GitHub**: Commit `.github/workflows/deploy.yml` and push to `main`.
5. **Done!** Every future `git push origin main` will build and deploy automatically.
