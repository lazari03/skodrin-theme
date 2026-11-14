<?php
/**
 * Plugin Name: Skodrin Core
 * Description: Rotary content types and metadata independent of the theme.
 * Version: 0.1.0
 * Requires at least: 6.7
 * Requires PHP: 8.1
 * Text Domain: skodrin-core
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
require_once __DIR__ . '/includes/content.php';
register_activation_hook( __FILE__, static function () { skodrin_register_content(); flush_rewrite_rules(); } );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
