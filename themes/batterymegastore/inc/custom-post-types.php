<?php
/**
 *  Project-Specific Custom Post Types and Taxonomies
 */

/**
 * This function is a wrapper function for registering custom post types
 * @param n/a
 * @return n/a
*/
function bms_register_post_types() {
  $post_types_to_register = array(
    'faq' => array(
      'singular'  => 'FAQ',
      'plural'    => 'FAQs',
      'supports' => array(),
      'icon'          => 'list-view',
      'public'        => false,
      'menu_position' => 20,
      'slug'          => 'faq'
    )
  );

  if ( $post_types_to_register ) {
    foreach ( $post_types_to_register as $post_type => $data ) {
      $default_supports = array(
        'title',
        'page-attributes',
        'revisions',
        'author'
      );

      $labels = array(
        'name'                => $data['plural'],
        'all_items'           => 'All '.$data['plural'],
        'singular_name'       => $data['singular'],
        'add_new'             => 'Add '.$data['singular'],
        'add_new_item'        => 'Add new '.$data['singular'],
        'edit_item'           => 'Edit '.$data['singular'],
        'new_item'            => 'New '.$data['singular'],
        'view_item'           => 'View '.$data['singular'],
        'search_items'        => 'Search '.$data['plural'],
        'not_found'           => 'Nothing found',
        'not_found_in_trash'  => 'Trash is empty',
        'parent_item_colon'   => $data['plural'].':',
        'menu_name'           => $data['plural']
      );

      $args = array(
        'labels'              => $labels,
        'description'         => isset( $data['description'] ) ? $data['description'] : '',
        'public'              => $data['public'],
        'exclude_from_search' => isset( $data['exclude_from_search'] ) ? $data['exclude_from_search'] : !$data['public'],
        'publicly_queryable'  => isset( $data['publicly_queryable'] ) ? $data['publicly_queryable'] : $data['public'],
        'show_ui'             => isset( $data['show_ui'] ) ? $data['show_ui'] : true, // show in admin
        'show_in_nav_menus'   => isset( $data['show_in_nav_menus'] ) ? $data['show_in_nav_menus'] : $data['public'],
        'show_in_menu'        => isset( $data['show_in_menu'] ) ? $data['show_in_menu'] : true, //show in admin menu - show_ui must be true
        'menu_position'       => isset( $data['menu_position'] ) ? $data['menu_position'] : null,
        'menu_icon'           => isset( $data['icon'] ) ? 'dashicons-'.$data['icon'] : '',
        'capability_type'     => isset( $data['capability_type'] ) ? $data['capability_type'] : 'post',
        'hierarchical'        => isset( $data['hierarchical'] ) ? $data['hierarchical'] : false,
        'supports' => isset( $data['supports'] ) && !empty( $data['supports'] ) ? array_unique( array_merge( $default_supports, $data['supports'] ) ) : $default_supports,
        'rewrite' => array(
          'slug'        => $data['slug'],
          'with_front'  => isset( $data['with_front'] ) ? $data['with_front'] : false
        ),
        'has_archive'   => isset( $data['has_archive'] ) ? $data['has_archive'] : false,
        'query_var'     => isset( $data['query_var'] ) ? $data['query_var'] : true,
        'can_export'    => isset( $data['can_export'] ) ? $data['can_export'] : true,
        'show_in_rest'  => isset( $data['show_in_rest'] ) ? $data['show_in_rest'] : true,
        'taxonomies'    => isset( $data['taxonomies'] ) ? $data['taxonomies'] : array() // Add taxonomies
      );

      if ( isset( $data['classic_editor'] ) && $data['classic_editor'] ) {
        $args['show_in_rest'] = false; // this forces usage of classic editor
      }

      if ( isset( $data['template'] ) ) {
        $args['template'] = $data['template'];
      }

      if ( isset( $data['template_lock'] ) ) {
        $args['template_lock'] = $data['template_lock'];
      }

      register_post_type( $post_type, $args );
    }
  }
}
add_action( 'init', 'bms_register_post_types' );

/**
 * This function is a wrapper function for registering custom taxonomies
 * @param n/a
 * @return n/a
*/
function bms_register_taxonomies() {
  $taxonomies_to_register = array(
    // 'position' => array(
    //   'singular' => 'Position',
    //   'plural'   => 'Positions',
    //   'post_type' => 'team_member',
    //   'rewrite'  => array( 'slug' => 'position' ),
    // )
  );

  if ( $taxonomies_to_register ) {
    foreach ( $taxonomies_to_register as $taxonomy => $data ) {
      $labels = array(
        'name'              => $data['plural'],
        'singular_name'     => $data['singular'],
        'search_items'      => 'Search ' . $data['plural'],
        'all_items'         => 'All ' . $data['plural'],
        'parent_item'       => 'Parent ' . $data['singular'],
        'parent_item_colon' => 'Parent ' . $data['singular'] . ':',
        'edit_item'         => 'Edit ' . $data['singular'],
        'update_item'       => 'Update ' . $data['singular'],
        'add_new_item'      => 'Add New ' . $data['singular'],
        'new_item_name'     => 'New ' . $data['singular'] . ' Name',
        'menu_name'         => $data['plural'],
      );

      $args = array(
        'labels'        => $labels,
        'hierarchical'  => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_admin_column' => true,
        'query_var'     => true,
        'rewrite'       => $data['rewrite'],
      );

      register_taxonomy( $taxonomy, $data['post_type'], $args );
    }
  }

  // register_taxonomy_for_object_type( 'product_cat', 'post' );
}
add_action( 'init', 'bms_register_taxonomies' );

function bms_product_categories_post_types( $post_types ) {
  $post_types[] = 'post';
  $post_types[] = 'faq';

  return $post_types;
}
add_filter('woocommerce_taxonomy_objects_product_cat', 'bms_product_categories_post_types');

function bms_product_categories_args( $args ) {
  $args['label'] = __( 'Product categories', 'woocommerce' );
  $args['labels']['singular_name'] = __( 'Product category', 'woocommerce' );
  $args['labels']['menu_name'] = _x( 'Product categories', 'Admin menu name', 'woocommerce' );
  $args['show_admin_column '] = true;
  return $args;
}
add_filter('woocommerce_taxonomy_args_product_cat', 'bms_product_categories_args');

function bms_admin_custom_columns_faq( $columns ) {
  $new_order = array();

  foreach( $columns as $key => $title ) {
    if ( $key == 'author' ) {
      $new_order['display_on'] = __('Display On', 'xfive');
      $new_order['selected_cats'] = __('Categories', 'xfive');
    }

    $new_order[$key] = $title;
  }

  $new_order[$key] = $title;

  return $new_order;
}
add_filter( 'manage_edit-faq_columns', 'bms_admin_custom_columns_faq' );

function bms_admin_columns_display_faq( $column_name, $post_id ) {
  switch( $column_name ) {
    case 'display_on':
      echo ucfirst( esc_html( get_field('faq_display_on', $post_id) ) ) ?: 'Both';
      break;
    case 'selected_cats':
      $categories = wp_get_post_terms( $post_id, 'product_cat', array(
        'fields' => 'id=>name',
      ) );

      if ( $categories ) {
        echo sprintf('<div style="max-height:100px; overflow:auto;">%s</div>', esc_html( implode(', ', $categories ) ));
      }
      break;
    default:
      break;
  }
}
add_action( 'manage_faq_posts_custom_column', 'bms_admin_columns_display_faq', 10, 2 );
