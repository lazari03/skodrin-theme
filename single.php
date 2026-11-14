<?php get_header(); ?>
<main id="main" class="wrap site-main">
<?php while (have_posts()) : the_post(); get_template_part('template-parts/content'); the_post_navigation(); if (comments_open() || get_comments_number()) { comments_template(); } endwhile; ?>
</main><?php get_footer(); ?>
