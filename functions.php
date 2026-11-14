<?php
/**
 * Skodrin presentation setup.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
add_action( 'after_setup_theme', static function () {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_editor_style( 'assets/editor.css' );
} );
add_action( 'init', static function () {
    foreach ( array( 'card' => 'Card', 'glass' => 'Glass', 'azure-band' => 'Azure band', 'gold-band' => 'Gold band', 'dark' => 'Dark' ) as $name => $label ) {
        register_block_style( 'core/group', array( 'name' => $name, 'label' => $label ) );
    }
} );
add_action( 'wp_enqueue_scripts', static function () {
    wp_enqueue_style( 'skodrin-layout', get_theme_file_uri( 'assets/editor.css' ), array(), wp_get_theme()->get( 'Version' ) );
} );
