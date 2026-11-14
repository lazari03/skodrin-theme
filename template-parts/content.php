<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
<?php if (is_singular()) : ?><h1 class="entry-title"><?php the_title(); ?></h1><?php else : ?><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php endif; ?>
<?php if ('post' === get_post_type()) : ?><div class="entry-meta"><?php echo esc_html(get_the_date()); ?></div><?php endif; ?>
<?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?>
<div class="entry-content"><?php if (is_singular()) { the_content(); wp_link_pages(); } else { the_excerpt(); } ?></div>
</article>
