# Skodrin — Rotary Club Shkodër

WordPress 6.7+, PHP 8.1+. This repository contains the FSE theme at its root and the companion plugin in skodrin-core/.

## Installation
Install WordPress separately. Upload theme files (excluding skodrin-core, .github and development files) to wp-content/themes/skodrin-theme/. Upload skodrin-core/ to wp-content/plugins/skodrin-core/. Activate the plugin and theme in WordPress. Set the official club logo, navigation and site title in Appearance > Editor. Set the site language to Albanian under Settings > General.

## Deployment
Configure FTP_SERVER, FTP_USERNAME, FTP_PASSWORD, FTP_THEME_DIR, FTP_PLUGIN_DIR as repository secrets. The directory secrets must point to the dedicated theme and plugin folders, respectively, with trailing slashes. Run Deploy Skodrin to FTP manually, initially with dry_run enabled. The action uses explicit FTPS on port 21. Do not store database credentials in this repository.

## Implementation status
Phase 1: FSE foundation, design tokens, templates, editable header/footer, style variations.
Phase 2: Initial content types, taxonomies and metadata.
Not yet implemented: bilingual routing/translation administration, custom interactive blocks, payment processing, donation records, complete bilingual patterns, font assets, automated quality gates and runtime accessibility/performance verification. No payment gateway is enabled.
