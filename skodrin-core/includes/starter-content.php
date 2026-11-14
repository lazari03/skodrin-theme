<?php
/**
 * Explicit, non-destructive starter page installation.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
add_action( 'admin_menu', static function () {
    add_management_page( 'Skodrin Starter Content', 'Skodrin Setup', 'manage_options', 'skodrin-setup', 'skodrin_setup_screen' );
} );
function skodrin_setup_screen() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    ?>
    <div class="wrap"><h1>Skodrin Setup</h1>
    <?php if ( isset( $_GET['skodrin_setup'] ) && 'done' === $_GET['skodrin_setup'] ) : ?>
        <div class="notice notice-success"><p>Starter content processed. Existing pages were preserved. Review Pages and Appearance → Editor.</p></div>
    <?php endif; ?>
    <p>Create eight starter pages in Albanian, with editable Gutenberg content. Existing pages with the same slug are not overwritten. Projects and events remain empty until you add real club records.</p>
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
        <input type="hidden" name="action" value="skodrin_install_content">
        <?php wp_nonce_field( 'skodrin_install_content' ); ?>
        <p><label><input type="checkbox" name="set_home" value="1"> Set Kreu as the static homepage if no static homepage is already configured.</label></p>
        <?php submit_button( 'Create starter pages' ); ?>
    </form></div>
    <?php
}
add_action( 'admin_post_skodrin_install_content', static function () {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Permission denied.', '', array( 'response' => 403 ) ); }
    check_admin_referer( 'skodrin_install_content' );
    $pages = array(
        array( 'kreu', 'Kreu', '', '' ),
        array( 'rreth-nesh', 'Rreth nesh', '<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Rreth Rotary Club Shkodër</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Rotary bashkon njerëz që besojnë në shërbimin ndaj komunitetit, mirëkuptimin dhe bashkëpunimin. Synimi ynë është të nxisim angazhimin dhe të krijojmë mundësi për ndryshim pozitiv në Shkodër.</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Vlerat tona</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Shërbimi, integriteti, miqësia, diversiteti dhe lidershipi janë në qendër të frymës së Rotary.</p>
<!-- /wp:paragraph -->
', '' ),
        array( 'projektet', 'Projektet', '<!-- wp:paragraph -->
<p>Nismat e klubit dhe kontributet për komunitetin.</p>
<!-- /wp:paragraph -->
<!-- wp:query {"queryId":41,"query":{"perPage":3,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-excerpt {"excerptLength":22} /-->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>Projektet do të shfaqen këtu sapo të publikohen.</p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
', '' ),
        array( 'eventet', 'Eventet', '<!-- wp:paragraph -->
<p>Takimet dhe aktivitetet e Rotary Club Shkodër.</p>
<!-- /wp:paragraph -->
<!-- wp:query {"queryId":42,"query":{"perPage":3,"pages":0,"offset":0,"postType":"event","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-excerpt {"excerptLength":22} /-->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>Nuk ka ende evente të publikuara.</p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
', '' ),
        array( 'perfshihu', 'Përfshihu', '<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Bëhu pjesë e ndryshimit</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Nëse dëshiron të kontribuosh me kohën, përvojën ose idetë e tua, njihu me Rotary dhe mënyrat për t’u angazhuar.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://www.rotary.org/">Mëso më shumë për Rotary</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
', '' ),
        array( 'lajme', 'Lajme', '<!-- wp:query {"queryId":43,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-excerpt {"excerptLength":22} /-->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>Nuk ka ende lajme të publikuara.</p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
', '' ),
        array( 'donacione', 'Donacione', '<!-- wp:paragraph -->
<p>Kontributet mbështesin nismat e komunitetit. Informacioni zyrtar për mënyrat e dhurimit do të publikohet pasi të konfirmohet nga klubi. Nuk pranojmë pagesa online në këtë faqe për momentin.</p>
<!-- /wp:paragraph -->
', 'page-donate' ),
        array( 'kontakt', 'Kontakt', '<!-- wp:paragraph -->
<p>Për të mësuar më shumë rreth Rotary, mund të vizitoni faqen zyrtare të organizatës. Kontaktet dhe informacioni i takimeve të klubit do të shtohen pasi të konfirmohen.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://www.rotary.org/">Rotary International</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
', '' ),
    );
    $home = 0;
    foreach ( $pages as $data ) {
        list( $slug, $title, $content, $template ) = $data;
        $existing = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $existing ) {
            if ( 'kreu' === $slug && 'publish' === $existing->post_status ) { $home = $existing->ID; }
            continue;
        }
        $id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_name' => $slug, 'post_title' => $title, 'post_content' => $content, 'meta_input' => array( 'rc_lang' => 'sq', 'rc_translation_group' => wp_generate_uuid4() ) ), true );
        if ( is_wp_error( $id ) ) { wp_die( esc_html( $id->get_error_message() ) ); }
        if ( $template ) { update_post_meta( $id, '_wp_page_template', $template ); }
        if ( 'kreu' === $slug ) { $home = $id; }
    }
    if ( $home && isset( $_POST['set_home'] ) && 'page' !== get_option( 'show_on_front' ) ) {
        update_option( 'page_on_front', $home );
        update_option( 'show_on_front', 'page' );
    }
    wp_safe_redirect( admin_url( 'tools.php?page=skodrin-setup&skodrin_setup=done' ) );
    exit;
} );
