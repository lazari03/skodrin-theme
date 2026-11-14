<?php if (post_password_required()) { return; } ?>
<section class="comments-area">
<?php if (have_comments()) : ?><h2><?php esc_html_e('Comments','skodrin'); ?></h2><ol><?php wp_list_comments(array('style'=>'ol','avatar_size'=>48)); ?></ol><?php the_comments_pagination(); endif; ?>
<?php comment_form(); ?>
</section>
