<?php


/***********************************************************
////
//// WooCommerce Missing Structured Data
////
*************************************************************/
//add_filter( 'woocommerce_structured_data_product', 'custom_woocommerce_structured_data_product' );
function custom_woocommerce_structured_data_product ($data) {
    global $product;

    if( $product->get_attribute('pa_brand') == '' ){
        $data['brand'] = "Battery Megastore";
    }else{
        $data['brand'] = $product->get_attribute('pa_brand') ?? "Battery Megastore";
    }
    $data['mpn'] = $product->get_sku() ?? null;
    //$data['reviewCount'] = $product->get_review_count() ?? null;
    if( $product->get_review_count() == 0 ){
        $data['aggregateRating']['ratingValue'] = 5;
        $data['aggregateRating']['ratingCount'] = 1;
    }else{
        $data['aggregateRating']['ratingValue'] = $product->get_average_rating() ?? null;
        $data['aggregateRating']['ratingCount'] = $product->get_review_count() ?? null;
    }
    return $data;
}

/***********************************************************
////
//// WooCommerce Rename Product Information Tab
////
*************************************************************/
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

    global $product;
    if( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) { // Check if product has attributes, dimensions or weight
        $tabs['additional_information']['title'] = __( 'Specification' );    // Rename the additional information tab
    }
    return $tabs;
}


/***********************************************************
////
//// WooCommerce Add Datasheet Button Frontend
////
*************************************************************/
add_action('woocommerce_single_product_summary','add_download_tech_spec_info', 35 );
function add_download_tech_spec_info($info) {
    global $product;

    // Product Data Sheets
    $datasheet_url = get_post_meta($product->id, 'battery_product_datasheet', true );
    if( $datasheet_url ){
        echo '<a href="'.$datasheet_url.'" class="button accent data-sheet" target="_blank"><i class="fas fa-file"></i>&nbsp;&nbsp;Download Data Sheet</a>';
    }

    // Product Manuals
    $manual_url = get_post_meta($product->id, 'battery_product_manual', true );
    if( $manual_url ){
        echo '<a href="'.$manual_url.'" class="button accent data-sheet manual" target="_blank"><i class="fas fa-file"></i>&nbsp;&nbsp;Download Product Manual</a>';
    }
}

/***********************************************************
////
//// WooCommerce Add Lead Time Frontend
////
*************************************************************/

add_action('woocommerce_before_add_to_cart_form','add_product_lead_time_info', 29 );
function add_product_lead_time_info($info) {
    global $product;

    // Product Lead Time
    $product_leadtime = get_post_meta($product->id, 'battery_product_leadtime', true );
    if( $product_leadtime ){
        echo '<div class="lead-info">Delivery: '.$product_leadtime.'</div>';
    }
}

/*/////////////////////////////////////////////////////////
 * WooCommerce Product Meta
 * Change Product Meta - Remove Category & Add SKU Back
/*/////////////////////////////////////////////////////////
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action('woocommerce_single_product_summary', 'change_product_meta', 40);
function change_product_meta(){
    global $product;
    echo '<div class="product_meta">';
    echo '<span class="sku_wrapper">Product SKU: ';
    echo '<span class="sku">' . $product->get_sku() . '</span>';
    echo '</span>';
    echo '</div>';
}

/*/////////////////////////////////////////////////////////
 * WooCommerce Product Category Count
 * Remove Product Category Counts
/*/////////////////////////////////////////////////////////
add_filter( 'woocommerce_subcategory_count_html', 'batterymegastore_hide_subcategory_count', 40 );
function batterymegastore_hide_subcategory_count() {
  /* empty - no count */
}

/*/////////////////////////////////////////////////////////
 * Battery Megastore WooCommerce Product Tab
 * Add New Tab To Products
/*/////////////////////////////////////////////////////////
// Add Product Data Sheet Functinality
add_filter( 'woocommerce_product_data_tabs', 'batterymega_product_settings_tabs' );
function batterymega_product_settings_tabs( $tabs ) {
    $tabs['batterymegastore'] = array(
        'label'    => esc_html__( 'Battery Megastore', 'peakshops' ),
        'target'   => 'batterymega_product_data',
        'priority' => 11,
    );
    return $tabs;

}

// Battery Megastore Product Tab Content.
add_action( 'woocommerce_product_data_panels', 'batterymega_product_panels' );
function batterymega_product_panels() {

    echo '<div id="batterymega_product_data" class="panel woocommerce_options_panel">';
    echo '<div class="options_group">';

    woocommerce_wp_text_input(
        array(
            'id'          => 'battery_product_leadtime',
            'value'       => get_post_meta( get_the_ID(), 'battery_product_leadtime', true ),
            'label'       => 'Lead Time Text',
            'placeholder' => '',
            'data_type'   => 'wc_input_url',
            'description' => esc_html__( 'Lead Time Text - I.e. Dispatches in 5 working days', 'peakshops' ),
        )
    );

    woocommerce_wp_text_input(
        array(
            'id'          => 'battery_product_datasheet',
            'value'       => get_post_meta( get_the_ID(), 'battery_product_datasheet', true ),
            'label'       => 'Data Sheet URL',
            'placeholder' => '',
            'data_type'   => 'wc_input_url',
            'description' => esc_html__( 'Data Sheet URL - i.e. https://www.url.com', 'peakshops' ),
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => 'battery_product_manual',
            'value'       => get_post_meta( get_the_ID(), 'battery_product_manual', true ),
            'label'       => 'Manual URL',
            'placeholder' => '',
            'data_type'   => 'wc_input_url',
            'description' => esc_html__( 'Manual URL - i.e. https://www.url.com', 'peakshops' ),
        )
    );
    echo '</div>';
    echo '</div>';
}

// Save Battery Megastore Tab Content.
add_action( 'woocommerce_process_product_meta', 'batterymega_save_product_fields', 10, 2 );
function batterymega_save_product_fields( $id, $post ) {
    $thb_product_leadtime     = filter_input( INPUT_POST, 'battery_product_leadtime', FILTER_SANITIZE_STRING );
    $thb_product_datasheet    = filter_input( INPUT_POST, 'battery_product_datasheet', FILTER_SANITIZE_STRING );
    $thb_product_manual       = filter_input( INPUT_POST, 'battery_product_manual', FILTER_SANITIZE_STRING );

    // Update the post meta with our new sanatized string
    update_post_meta( $id, 'battery_product_leadtime', $thb_product_leadtime );
    update_post_meta( $id, 'battery_product_datasheet', $thb_product_datasheet );
    update_post_meta( $id, 'battery_product_manual', $thb_product_manual );
}

/***********************************************************
//// Add Attributes to Product Shop Loop
//// Battery Megastore Wanted To Show Battery Amps on Product Loop
//// Also used to created custom do_action on the quickview page for this
*************************************************************/
add_action('woocommerce_after_shop_loop_item_title', 'display_custom_product_attributes_on_loop', 2 );
add_action('display_custom_product_attributes_on_loop', 'display_custom_product_attributes_on_loop'); // Used to create do_action in quickview
function display_custom_product_attributes_on_loop() {
    global $product;

    // Settings: Here below set your product attribute label names
    $attributes_names = array(
                                'pa_voltage',
                                'pa_voltage-v',
                                'pa_cold-cranking-en',
                                'pa_battery-capacity-c20',
                                'pa_capacity-c20',
                                'pa_ah',
                                'pa_inputoutput-voltage',
                                'pa_charge-current',
                                'pa_number-of-outputs',
                                'pa_cont-output-power-at-25c',
                                'pa_peak-power',
                                'pa_rated-charge-current',
                                'pa_bluetooth',
                                'pa_protection-category',
                                'pa_nominal-power',
                                'pa_transfer-switch',
                                'pa_max-battery-charge-curren',

                            );
    $attributes_data  = array(); // Initializing

    // Loop through product attribute settings array
    foreach ( $attributes_names as $attribute_name ) {
        if ( $value = $product->get_attribute($attribute_name) ) {
            //print_r($value);
            $attributes_data[] = '<tr><th>' . wc_attribute_label($attribute_name) . '</th><td>' . $value . '</td></tr>';
        }
    }

    if ( ! empty($attributes_data) ) {
        echo '<table class="loop-attributes">' . implode( '', $attributes_data ) . '</table>';
    }
}

/***********************************************************
////
//// Remove Related Products from Single Product Page
////
*************************************************************/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Price Match Popup
function batterymega_price_match_popup() {

    if ( ! is_admin() ) {
        ?>
        <aside id="pricematch-popup" class="mfp-hide theme-popup pricematch-popup">
            <div class="theme-popup-content">
                <?php echo do_shortcode('[contact-form-7 id="1454881" title="Price Match Form"]'); ?>
            </div>
        </aside>
        <?php
    }
}
add_action( 'wp_footer', 'batterymega_price_match_popup' );

/***********************************************************
////
//// Add Pricematch Button next to Price On Single Product
////
*************************************************************/
add_filter( 'woocommerce_single_product_summary', 'batterymega_add_pricematch_functionality', 11 );
function batterymega_add_pricematch_functionality(){
    if( is_singular('product') ){
        echo'<div class="open-pricematch price-match-btn">';
        echo '<span class="text">Seen it cheaper elsewhere?</span> <i class="fas fa-check-square" aria-hidden="true"></i>';
        echo '</div>';
    }
}

/***********************************************************
////
//// WooCommerce Add Attributes Below Description
////
*************************************************************/
//add_filter( 'the_content', 'misha_add_something_description_tab' );
function misha_add_something_description_tab( $content ){

    if( is_product() ) { // I recommend to always use this condition
        global $product;
        $content .= wc_display_product_attributes($product);
    }

    return $content;

}

//add_action( 'woocommerce_after_single_product_summary', 'add_atts_to_summary' );
function add_atts_to_summary() {
    global $product;
    wc_display_product_attributes( $product );
}

/**
 * This function will check if cart contains products with battery categories and display the agreement checkbox
 * @param 
 * @return 
*/
function bms_show_battery_agreement() {
  $show = false;

  $display_rules = get_field('cba_display_rules', 'option');

  if ( !$display_rules ) {
    return;
  }

  $show_for_categories = $display_rules['cba_rules_categories'] ?: array();
  $show_for_products = $display_rules['cba_rules_products'] ?: array();

  if ( !$show_for_categories && !$show_for_products ) {
    return;
  }

  $cart_contents = WC()->cart->get_cart();

  if ( $cart_contents ) {
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

      if ( in_array( $product_id, $show_for_products ) ) {
        $show = true;
        break;
      }

      $categories = wp_get_post_terms( $product_id, 'product_cat', array('fields' => 'ids'));

      if ( array_intersect($categories, $show_for_categories) ) {
        $show = true;
        break;
      }
    }
  }

  return $show;
}
function bms_battery_agreement() {
  $show_agreement = bms_show_battery_agreement();

  if ( $show_agreement ) {
    $label = get_field('cba_text', 'option');

    $checkbox = woocommerce_form_field( 'battery_agreement', array(
      'type' => 'checkbox',
      'class' => array(),
      'label' => wp_kses($label, array(
        'span' => array( 'style' => array() ),
        'strong' => array( 'style' => array() ),
        'em' => array( 'style' => array() ),
        'a' => array( 'href' => array(), 'target' => array(), 'rel' => array(), 'title' => array(), 'style' => array() )
      )),
      'required' => true,
      'return' => true
    ),  WC()->checkout->get_value( 'battery_agreement' ) );

    return sprintf(
      '<tr><td colspan="2">
        <div class="cart-battery-agreement js-cart-battery-agreement">%s</div>
      </td></tr>',
      $checkbox
    );
  }

  return '';
}
function bms_battery_checkbox_in_cart() {
  $agreement = bms_battery_agreement();

  if ( $agreement ) {
    printf('<tr><td colspan="2">%s</td></tr>', $agreement);
  }
}
add_action( 'woocommerce_cart_totals_after_order_total', 'bms_battery_checkbox_in_cart', 99);

function bms_battery_checkbox_in_checkout() {
  $agreement = bms_battery_agreement();

  if ( $agreement ) {
    echo $agreement;
  }
}
add_action( 'woocommerce_review_order_before_submit', 'bms_battery_checkbox_in_checkout' );
add_action( 'woocommerce_pay_order_before_submit', 'bms_battery_checkbox_in_checkout' );

function bms_battery_checkbox_checkout_custom_validation( $fields, $errors ) {
  $show_agreement = bms_show_battery_agreement();

  if ( $show_agreement ) {
    $battery_agreement = isset( $_POST[ 'battery_agreement' ] ) ? absint( $_POST[ 'battery_agreement' ] ) : 0;

    if ( !$battery_agreement ) {
      $error_message = get_field('cba_checkout_error_message', 'option');

      if ( $error_message ) {
        $errors->add( 'validation', $error_message );
      }
    }
  }
}
add_action( 'woocommerce_after_checkout_validation', 'bms_battery_checkbox_checkout_custom_validation', 99, 2 );

function bms_display_faq_and_related_posts() {
  $layout = get_field('product_faq_rp_layout', 'option') ?: '2col';
  echo '<div class="product-faq-and-posts-section js-product-faq-and-posts-section has-'.esc_attr( $layout ).'-layout">';
  get_template_part('inc/templates/product/faq' );
  get_template_part('inc/templates/product/related-posts', '', array( 'layout' => $layout ) );
  echo '</div>';
}
add_action('woocommerce_product_after_tabs', 'bms_display_faq_and_related_posts');

function bms_display_faq_on_categories() {
  if ( is_product_category() ) {
    get_template_part('inc/templates/product/faq');
  }
}
add_action('woocommerce_after_shop_loop', 'bms_display_faq_on_categories', 20);
