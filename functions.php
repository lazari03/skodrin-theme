<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => __('Primary menu', 'skodrin')));
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('skodrin-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
});
