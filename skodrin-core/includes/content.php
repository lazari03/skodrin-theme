<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function skodrin_register_content() {
    $types = array(
        'project' => array( 'Projects', 'Project', 'projects' ),
        'event' => array( 'Events', 'Event', 'events' ),
        'club_member' => array( 'Members', 'Member', 'members' ),
        'partner' => array( 'Partners', 'Partner', 'partners' ),
        'testimonial' => array( 'Testimonials', 'Testimonial', 'testimonials' ),
    );
    foreach ( $types as $type => $labels ) {
        register_post_type( $type, array(
            'labels' => array( 'name' => $labels[0], 'singular_name' => $labels[1] ),
            'public' => true, 'show_in_rest' => true, 'has_archive' => true,
            'rewrite' => array( 'slug' => $labels[2] ),
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
        ) );
        register_post_meta( $type, 'rc_lang', array( 'type' => 'string', 'single' => true, 'default' => 'sq', 'show_in_rest' => array( 'schema' => array( 'type' => 'string', 'enum' => array( 'sq', 'en' ) ) ), 'sanitize_callback' => static function ( $value ) { return 'en' === $value ? 'en' : 'sq'; } ) );
        register_post_meta( $type, 'rc_translation_group', array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ) );
    }
    register_taxonomy( 'area_of_focus', 'project', array( 'label' => 'Areas of Focus', 'public' => true, 'show_in_rest' => true, 'hierarchical' => true ) );
    register_taxonomy( 'event_type', 'event', array( 'label' => 'Event Types', 'public' => true, 'show_in_rest' => true, 'hierarchical' => true ) );
    foreach ( array( 'project' => array( 'project_goal', 'project_raised' ), 'event' => array(), 'club_member' => array() ) as $type => $keys ) {
        foreach ( $keys as $key ) {
            register_post_meta( $type, $key, array( 'type' => 'number', 'single' => true, 'show_in_rest' => true, 'default' => 0, 'sanitize_callback' => static function ( $value ) { return max( 0, (float) $value ); } ) );
        }
    }
    foreach ( array( 'project' => array( 'project_status' ), 'event' => array( 'event_start', 'event_end', 'event_location', 'event_map_coords' ), 'club_member' => array( 'member_role', 'member_term', 'member_classification', 'socials' ) ) as $type => $keys ) {
        foreach ( $keys as $key ) {
            register_post_meta( $type, $key, array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field' ) );
        }
    }
}
add_action( 'init', 'skodrin_register_content' );
