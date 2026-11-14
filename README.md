# Skodrin WordPress theme

This repository contains the custom WordPress theme, not WordPress core.

## Fresh FTP hosting installation
1. Download WordPress from https://wordpress.org/download/ and extract the ZIP.
2. Upload the contents of the extracted wordpress directory to your domain's document root (often public_html or htdocs).
3. Create a MySQL/MariaDB database and database user in your hosting control panel.
4. Open your domain in a browser and complete the WordPress installer using the database credentials supplied by your host.
5. Upload the theme files style.css, index.php and functions.php from this repository to wp-content/themes/skodrin-theme/ on your server.
6. In WordPress admin, open Appearance > Themes and activate Skodrin.

For an existing WordPress installation, skip steps 1–4.

Use SFTP or FTPS if available. Never commit wp-config.php, database dumps, FTP credentials or uploaded media. WordPress core and plugins are updated through WordPress, independently of this repository.
