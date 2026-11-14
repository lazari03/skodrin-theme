<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
<?php wp_nav_menu(array('theme_location' => 'primary', 'fallback_cb' => false)); ?>
</header>
<main>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
<?php if (is_singular()) : ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); wp_link_pages(); ?>
<?php else : ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php the_excerpt(); ?>
<?php endif; ?>
</article>
<?php endwhile; the_posts_pagination(); else : ?>
<p><?php esc_html_e('No content found.', 'skodrin'); ?></p>
<?php endif; ?>
</main>
<footer class="site-footer"><?php bloginfo('name'); ?></footer>
<?php wp_footer(); ?>
</body>
</html>
