<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#main"><?php esc_html_e('Skip to content','skodrin'); ?></a>
<header class="site-header"><div class="wrap header-inner">
<?php if (has_custom_logo()) { the_custom_logo(); } else { ?>
<a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
<?php } ?>
<nav aria-label="<?php esc_attr_e('Primary menu','skodrin'); ?>">
<?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'nav-menu','fallback_cb'=>false)); ?>
</nav></div></header>
