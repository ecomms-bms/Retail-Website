<?php

/*/////////////////////////////////////////////////////////
 * LOCATION HEADER - SPEED
 * Disable Wordpress Emojis
/*/////////////////////////////////////////////////////////
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
add_action( 'widgets_init', 'xfive_widgets_init' );
add_action( 'wp_body_open', 'xfive_add_header_widget_area' );

/*/////////////////////////////////////////////////////////
 * LOCATION TinyMCE
 * Remove Emoji From TinyMCE 
/*/////////////////////////////////////////////////////////
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/*/////////////////////////////////////////////////////////
 * LOCATION HEADER - SPEED
 * Disable WooCommerce Block Styles - Gutenberg
/*/////////////////////////////////////////////////////////
function themesharbor_disable_woocommerce_block_styles() {
  wp_dequeue_style( 'wc-blocks-style' );
}
add_action( 'wp_enqueue_scripts', 'themesharbor_disable_woocommerce_block_styles' );

/*/////////////////////////////////////////////////////////
 * XFIVE
 * Register sidebars
/*/////////////////////////////////////////////////////////
function xfive_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Header Widget Area', 'peakshops' ),
        'id'            => 'header_widget_area',
        'before_widget' => '<div class="c-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>', ) );
}

function xfive_add_header_widget_area() {
    if ( function_exists('dynamic_sidebar') ) {
        dynamic_sidebar('header_widget_area'); 
    }
}
