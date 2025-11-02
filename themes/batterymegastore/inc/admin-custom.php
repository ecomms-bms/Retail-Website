<?php
// WordPress Admin Overrides
// Built for Battery Megastore
// By Outrank
// Version 1.0.1
// Last Updated: 27th April 2021

/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Remove Parent Theme From Appearance
/*/////////////////////////////////////////////////////////
add_filter('wp_prepare_themes_for_js','batterymega_kill_parent_theme');
function batterymega_kill_parent_theme($themes) {
    unset($themes['peakshops']);
    return $themes;
}


/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Remove Tags From Backend - Not Needed
/*/////////////////////////////////////////////////////////
add_action( 'init', 'outrank_unregister_tags' );
function outrank_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
    unregister_taxonomy_for_object_type( 'product_tag', 'product' );
}

/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Custom Option Tree Page Title
/*/////////////////////////////////////////////////////////
add_filter( 'ot_theme_options_page_title','batterymega_option_tree_page_title', 50);
function batterymega_option_tree_page_title( $pagetitle ) {
    $pagetitle = 'Battery Megastore Theme Options';
    return $pagetitle;
}

/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Custom Option Tree Apperance Menu Item Title
/*/////////////////////////////////////////////////////////
add_filter( 'ot_theme_options_menu_title', 'batterymega_option_tree_menu_title', 50);
function batterymega_option_tree_menu_title( $pagetitle ) {
    $pagetitle = 'Theme Options';
    return $pagetitle;
}

/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Remove Tags From Backend - Not Needed
/*/////////////////////////////////////////////////////////
add_action( 'ot_header_list', 'outrank_optiontree_filter_header_list' );
function outrank_optiontree_filter_header_list() {
    echo '<li class="theme_link show">By <a href="https://www.outrank.co.uk" target="_blank">Outrank</a></li>';
}


/*/////////////////////////////////////////////////////////
 * LOCATION CORE WP FUNCTIONS
 * Remove Unneeded Admin Nav Menus for PeakShop Parent
/*/////////////////////////////////////////////////////////
add_action( 'admin_menu', 'outrank_remove_menus' );
function outrank_remove_menus(){
    remove_menu_page( 'thb-product-registration' );
}
