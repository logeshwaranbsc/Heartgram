# Agent Rules

## Deployment to Shared Hosting (Hostinger)
When deploying a Laravel application to shared hosting (like Hostinger), where the application files sit in a private folder (e.g., heartgrams) and the public assets are moved to public_html:
1. Always use AppServiceProvider to bind the public path: Modifying index.php often fails due to aggressive OPcache. Instead, add this to app/Providers/AppServiceProvider.php inside the register() method:
   $this->app->usePublicPath(base_path('../public_html'));
2. Never upload the hot file: If the hot file exists in public or public_html, it forces Laravel Vite to look for a local dev server, leading to a ViteManifestNotFoundException in production. Always delete it.
3. Beware of CLI PHP Versions: Shared hosts often have different PHP versions for the web server and the SSH terminal. Using specific binaries (e.g., php84 artisan ...) or doing cache-clearing via File Manager (deleting bootstrap/cache/*) is required to avoid platform dependency errors.
4. Symlinking Storage without SSH: A simple link.php script with symlink() can create the storage link from the browser if terminal access is problematic.
