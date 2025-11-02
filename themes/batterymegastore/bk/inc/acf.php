<?php
function bms_acf_options_pages() {
  if ( function_exists( 'acf_add_options_sub_page' ) ) {
    acf_add_options_sub_page( array(
      'page_title'  => 'Settings',
      'menu_title'  => 'Settings',
      'parent_slug' => 'edit.php?post_type=product'
    ) );
  }
}
add_action( 'acf/init', 'bms_acf_options_pages', 99 );

/**
 * This function will create custom tollbars for acf wyswigh field
 * @param n/a
 * @return n/a
*/
function bms_acf_wyswig_toolbars($toolbars) {
  $toolbars['Minimal'] = array(
    1 => array('bold', 'italic', 'alignleft', 'aligncenter', 'alignright', 'link', 'unlink', 'bullist', 'numlist', 'forecolor', 'removeformat')
  );

  if ( ( $key = array_search('code', $toolbars['Full' ][2]) ) !== false ) {
    unset( $toolbars['Full'][2][$key] );
  }

  return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars', 'bms_acf_wyswig_toolbars' );

/**
 * This function will add css styles to acf fileds in admin
 * @param n/a
 * @return styles
*/
function bms_acf_toolbar_styles() {
  echo '
  <style type="text/css">
    [data-toolbar="basic"] iframe,
    [data-toolbar="basic"] textarea {
      height: auto !important;
      min-height: 280px !important;
    }
    [data-toolbar="minimal"] iframe,
    [data-toolbar="minimal"] textarea {
      height: auto !important;
      min-height: 140px !important;
    }
    .acf-button-group {
      flex-wrap: wrap;
      display: flex;
      justify-content: flex-start;
    }
    .acf-button-group label {
      flex: 0 1 auto;
    }
  </style>';
}
add_action( 'admin_head', 'bms_acf_toolbar_styles' );
?>
