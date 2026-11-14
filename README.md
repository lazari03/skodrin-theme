# Skodrin — Rotary Club Shkodër

WordPress 6.7+, PHP 8.1+. This repository contains the FSE theme at its root and the companion plugin in skodrin-core/.

## Installation
Install WordPress separately. Upload theme files (excluding skodrin-core, .github and development files) to wp-content/themes/skodrin-theme/. Upload skodrin-core/ to wp-content/plugins/skodrin-core/. Activate the plugin and theme in WordPress. Set the official club logo, navigation and site title in Appearance > Editor. Set the site language to Albanian under Settings > General.

## Deployment
Configure FTP_SERVER, FTP_USERNAME, FTP_PASSWORD and FTP_WP_ROOT as repository secrets. FTP_WP_ROOT is the directory containing wp-admin and wp-content, relative to the FTP login (use / if WordPress is at the FTP root). The workflow derives wp-content/themes/skodrin-theme/ and wp-content/plugins/skodrin-core/ automatically. Existing FTP_THEME_DIR can serve as a fallback when it ends in /wp-content/themes/skodrin-theme/. FTP_PLUGIN_DIR is no longer used. Run Deploy Skodrin to FTP manually, initially with dry_run enabled. The action uses explicit FTPS on port 21. Do not store database credentials in this repository.

## Implementation status
Phase 1: FSE foundation, design tokens, templates, editable header/footer, style variations.
Phase 2: Initial content types, taxonomies and metadata.
Not yet implemented: bilingual routing/translation administration, custom interactive blocks, payment processing, donation records, complete bilingual patterns, font assets, automated quality gates and runtime accessibility/performance verification. No payment gateway is enabled.
