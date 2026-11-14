<?php
if (!defined('ABSPATH')) { exit; }
function skodrin_setup() {
    load_theme_textdomain('skodrin', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', array('flex-width'=>true, 'flex-height'=>true));
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    register_nav_menus(array('primary'=>__('Primary menu','skodrin')));
}
add_action('after_setup_theme','skodrin_setup');
function skodrin_assets() {
    wp_enqueue_style('skodrin-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    if (is_singular() && comments_open() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_action('wp_enqueue_scripts','skodrin_assets');
