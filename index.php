<?php get_header(); ?>
<main id="main" class="wrap site-main">
<?php if (is_archive()) { the_archive_title('<h1>','</h1>'); the_archive_description(); } ?>
<?php if (is_search()) { ?><h1><?php printf(esc_html__('Search results for: %s','skodrin'), esc_html(get_search_query())); ?></h1><?php } ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); get_template_part('template-parts/content'); endwhile; the_posts_pagination(); else : ?>
<h1><?php esc_html_e('Nothing found','skodrin'); ?></h1><?php get_search_form(); ?>
<?php endif; ?>
</main><?php get_footer(); ?>
