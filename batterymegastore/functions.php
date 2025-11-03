<?php



/*/////////////////////////////////////////////////////////

 * LOCATION CHILD THEME INCLUDES

 * Add Custom Functions Files

/*/////////////////////////////////////////////////////////

require get_stylesheet_directory() . '/inc/acf.php';

require get_stylesheet_directory() . '/inc/custom-post-types.php';

require get_stylesheet_directory() . '/inc/woocommerce-custom.php';

require get_stylesheet_directory() . '/inc/admin-custom.php';

require get_stylesheet_directory() . '/inc/frontend-custom.php';

require get_stylesheet_directory() . '/inc/class-bms-frontend-scripts.php';





/***********************************************************

 * ////

 * //// Add Google Analytics Tracking Code

 * ////

 *************************************************************/

add_action( 'wp_footer', 'outrank_add_paypal_analytics_tracking' );

function outrank_add_paypal_analytics_tracking() {

	?>
<link rel="preload" href="https://www.bmstechnologies.co.uk/wp-content/themes/batterymegastore/fonts/ukplate.woff2" as="font" type="font/woff2" crossorigin>
    <script type="text/javascript">(function () {

            function f() {

                var e = document.createElement("script");

                e.type = "text/javascript";

                e.async = true;

                e.src = "https://paypal-eu-cdn.cloudiq.com/tag/7ac9ab88-c99b-4322-9398-479aa2470c78-jlysri5z.js";

                var t = document.getElementsByTagName("head")[0];

                t.appendChild(e)

            }



            f()

        })();</script>

	<?php

	/*<!-- PayPal BEGIN --> <script> ;(function(a,t,o,m,s){a[m]=a[m]||[];a[m].push({t:new Date().getTime(),event:'snippetRun'});var f=t.getElementsByTagName(o)[0],e=t.createElement(o),d=m!=='paypalDDL'?'&m='+m:'';e.async=!0;e.src='https://www.paypal.com/tagmanager/pptm.js?id='+s+d;f.parentNode.insertBefore(e,f);})(window,document,'script','paypalDDL','4e9051c9-0ca7-476e-991e-2db38592b968'); </script> <!-- PayPal END -->*/

}



/***********************************************************

 * ////

 * //// Add FontAwesome CSS

 * ////

 *************************************************************/

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

function enqueue_load_fa() {

	wp_enqueue_style( 'load-fa',

		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );

}



/*/////////////////////////////////////////////////////////

 * LOCATION CHILD ADMIN CSS

 * Add Custom Admin CSS Files

/*/////////////////////////////////////////////////////////

add_action( 'admin_enqueue_scripts', 'batterymega_admin_style' );

function batterymega_admin_style() {

	wp_enqueue_style( 'batterymega-admin-styles',

		get_stylesheet_directory_uri() . '/assets/css/admin-custom.css' );

}



/***********************************************************

 * ////

 * //// Add Business Structured Data Markup To Footer

 * ////

 *************************************************************/

//add_action( 'wp_footer', 'add_business_schema_tofooter', 10 );

function add_business_schema_tofooter() {

	echo '

    <script type="application/ld+json">

    {

        "@context": "http://schema.org",

        "@type": "LocalBusiness",

        "address": {

        "@type": "PostalAddress",

            "streetAddress": "Unit 29 Alexandra Way, Ashchurch",

            "addressLocality": "Tewkesbury",

            "addressRegion": "Gloucestershire",

            "postalCode": "GL20 8NB",

            "addressCountry": "GB"

            },

        "description": "Batterymegastore was created as a straightforward way for you to buy batteries at competitive prices either over the internet or via telephone.",

        "name": "Battery Megastore",

        "url": "https://www.batterymegastore.co.uk/",

        "logo": "https://www.batterymegastore.co.uk/wp-content/uploads/2019/10/logonewpng_3a6154628818d3798674d1b75587b915.png",

        "image": "https://www.batterymegastore.co.uk/wp-content/uploads/2021/09/Hankook-automotive-banner-scaled-1.jpg",

        "pricerange": "££",

        "email":"sales@batterymegastore.co.uk",

        "telephone": "01684 298800",

        "openingHours": [ "Mo-Fr 08:00-17:30" ],

        "sameAs" : [ "https://www.facebook.com/Batterymegastore", "https://twitter.com/batterymega", "https://www.instagram.com/batterymegastore/", "https://www.linkedin.com/company/battery-megastore/"],

        "hasMap" : "https://www.google.com/maps/place/Battery+Megastore/@52.0004945,-2.1192014,15z/data=!4m5!3m4!1s0x0:0xaa08c32d79954c93!8m2!3d52.0004945!4d-2.1192014",

        "geo": {

            "@type": "GeoCoordinates",

            "latitude": "52.0004945",

            "longitude": "-2.1192014"

            },

        "aggregateRating": {

            "@type": "AggregateRating",

            "ratingValue": "4.2",

            "ratingCount": "10"

             },

        "review": [

            {

                "@type": "Review",

                "author": "Radovan Stevovic",

                "datePublished": "2021-09-16",

                "reviewBody": "Amazing service (price ,payment, delivery) I bought car battery Varta N85 Blue Dynamic for £20 less than on e-bay or amazon. Delivery was next day. Im really happy.",

                "reviewRating": {

                  "@type": "Rating",

                  "bestRating": "5",

                  "ratingValue": "5",

                  "worstRating": "1"

                }

            },

            {

                "@type": "Review",

                "author": "Richard Baker",

                "datePublished": "2020-03-17",

                "reviewBody": "Cant recommend Petz 1st enough, they always provide fantastic service and never fail to deliver. Petz 1st go above and beyond to make sure youre happy as well as provide advice and guidance on a wide range of great products",

                "reviewRating": {

                  "@type": "Rating",

                  "bestRating": "5",

                  "ratingValue": "5",

                  "worstRating": "1"

                }

            },

            {

                "@type": "Review",

                "author": "Carol Atkinson",

                "datePublished": "2020-03-19",

                "reviewBody": "Very good choice of pet products at very good prices, excellent delivery service, the quality of the products are good.",

                "reviewRating": {

                  "@type": "Rating",

                  "bestRating": "5",

                  "ratingValue": "5",

                  "worstRating": "1"

                }

            }

        ]

    }

    </script>';

}





/*/////////////////////////////////////////////////////////

 * Global UPS Add To Header

 * Add Battery Megastore Global UPS to Header

/*/////////////////////////////////////////////////////////

add_action( 'thb_before_main', 'batterymegastore_header_ups' );

function batterymegastore_header_ups() {

	?>

    <div class="row wpb_row row-fluid show-for-large no-row-padding full-width-row no-column-padding ups-header row-has-fill">

        <div class="wpb_column columns medium-12 thb-dark-column small-12">

            <div class="vc_column-inner">

                <div class="wpb_wrapper ">

                    <div class="row wpb_row vc_inner row-fluid max_width no-column-padding text-center">

                        <div class="wpb_column columns medium-4 thb-dark-column small-12">

                            <div class="vc_column-inner ups-header-custominner">

                                <div class="wpb_wrapper br">

                                    <div class="wpb_text_column wpb_content_element">

                                        <div class="wpb_wrapper">

                                            <p><i class="fas fa-pound-sign"></i>&nbsp;&nbsp;<span

                                                        class="headlines"><b>Unbeatable Prices</b>, every time</span></p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="wpb_column columns medium-4 thb-dark-column has-fill small-12">

                            <div class="vc_column-inner ups-header-custominner">

                                <div class="wpb_wrapper br">

                                    <div class="wpb_text_column wpb_content_element  ">

                                        <div class="wpb_wrapper">

                                            <p><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;<span

                                                        class="headlines"><b>Need Help?</b> Call us on 01684 298800</span></p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="wpb_column columns medium-4 thb-dark-column small-12">

                            <div class="vc_column-inner ups-header-custominner">

                                <div class="wpb_wrapper">

                                    <div class="wpb_text_column wpb_content_element  ">

                                        <div class="wpb_wrapper">

                                            <p><i class="fas fa-car-battery"></i>&nbsp;&nbsp;<span

                                                        class="headlines"><b>Correct Battery Fit</b> Guarantee</span></p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

	<?php

}



/*/////////////////////////////////////////////////////////

 * Action Scheduler

 * Only keep logs for 7 days

/*/////////////////////////////////////////////////////////

add_filter( 'action_scheduler_retention_period',

	'modify_action_schedule_retention_date' );

function modify_action_schedule_retention_date() {

	return DAY_IN_SECONDS * 7; // 7 Days

}



/** Disable All WooCommerce  Styles and Scripts Except Shop Pages*/

add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 15 );

function dequeue_woocommerce_styles_scripts() {

	if ( function_exists( 'is_woocommerce' ) ) {

		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {

			# Styles

			wp_dequeue_style( 'woocommerce-general' );

			wp_dequeue_style( 'woocommerce-layout' );

			wp_dequeue_style( 'woocommerce-smallscreen' );

			wp_dequeue_style( 'woocommerce_frontend_styles' );

			wp_dequeue_style( 'woocommerce_fancybox_styles' );

			wp_dequeue_style( 'woocommerce_chosen_styles' );

			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

			wp_dequeue_style( 'wwp-wholesale' );

			wp_dequeue_style( 'wc-form-builder' );

			wp_dequeue_style( 'wc_warranty' );

			wp_dequeue_style( 'wc-bundle-style' );

			wp_dequeue_style( 'woo_discount_pro_style' );

			wp_dequeue_style( 'wc-sagepaydirect' );

            # Scripts

			wp_dequeue_script( 'wwp-wholesale' );

			wp_dequeue_script( 'wc_price_slider' );

			wp_dequeue_script( 'wc-single-product' );

			wp_dequeue_script( 'wc-add-to-cart' );

			wp_dequeue_script( 'wc-cart-fragments' );

			wp_dequeue_script( 'wc-checkout' );

			wp_dequeue_script( 'wc-add-to-cart-variation' );

			wp_dequeue_script( 'wc-single-product' );

			wp_dequeue_script( 'wc-cart' );

			wp_dequeue_script( 'wc-chosen' );

			wp_dequeue_script( 'woocommerce' );

			wp_dequeue_script( 'prettyPhoto' );

			wp_dequeue_script( 'prettyPhoto-init' );

			wp_dequeue_script( 'jquery-blockui' );

			wp_dequeue_script( 'jquery-placeholder' );

			wp_dequeue_script( 'fancybox' );

			wp_dequeue_script( 'jqueryui' );

		}

	}

}



if ( ! function_exists( 'write_log' ) ) {



    function write_log( $log ) {



        if ( is_array( $log ) || is_object( $log ) ) {

            error_log( print_r( $log, true ) );

        } else {

            error_log( $log );



        }

    }

}



function bms_word_limiter( $string, $limit = 20, $affix = '' ) {

  return preg_replace( '/[^A-Za-z0-9\.]$/', '', implode(' ', array_slice( explode(' ', $string), 0, $limit ) ) ).$affix;

}



add_action('admin_enqueue_scripts', 'enqueue_tinymce_for_edit_category');

function enqueue_tinymce_for_edit_category( $hook ) {

    if ( $hook === 'term.php' ) {

        wp_enqueue_editor();

    }
	echo '<style>tr#user-4833 {
    		display: none !important;
		}</style>';

}



add_action('admin_footer', 'initialize_tinymce_for_custom_textareas');

function initialize_tinymce_for_custom_textareas() {

    ?>

    <script>

        jQuery(document).ready(function($) {

            const settings = {

                tinymce: {

                    toolbar: [

                        'link unlink | formatselect | bold italic | bullist numlist | separator | removeformat'

                    ]

                },

                quicktags: true

            };

            wp.editor.initialize('category_top_content', settings);

            wp.editor.initialize('category_bottom_content', settings);

        });

    </script>

    <?php

}
/*
global  $custom_shipping_method;
function update_shipping_fee() {
    if (isset($_POST['shipping_method'])) {
        $shipping_method = sanitize_text_field($_POST['shipping_method']);
        WC()->session->set('custom_shipping_method',  $shipping_method);
       // echo 'Response'. WC()->session->get('custom_shipping_method');
     //  return  WC()->session->get('custom_shipping_method');
        echo $custom_shipping_method;
    }
    wp_die(); // This is required to terminate immediately and return a proper response
}
add_action('wp_ajax_update_shipping_fee', 'update_shipping_fee');
add_action('wp_ajax_nopriv_update_shipping_fee', 'update_shipping_fee');

*/

add_action( 'woocommerce_before_calculate_totals', 'add_custom_weight', 10, 1 );
function add_custom_weight( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach ( $cart->get_cart() as $cart_item ) {
         //very simplified example - every item in cart will be 100 kg
        $cart_item['data']->set_weight( 0 );
    }
    // print_r( $cart->get_cart_contents_weight() ); // Only for testing (not on checkout page)
}




add_filter( 'woocommerce_thankyou_order_received_text', 'wpo_wcpdf_thank_you_link', 10, 2 );
function wpo_wcpdf_thank_you_link( $text, $order ) {
    $pdf_url = add_query_arg( array(
        'action'        => 'generate_wpo_wcpdf',
        'class'        => 'test',
        'document_type' => 'invoice',
        'order_ids'     => $order->get_id(),
        'order_key'     => $order->get_order_key(),
    ), admin_url( 'admin-ajax.php' ) );
    $link_text = 'Download a printable invoice / payment confirmation';
    $text .= sprintf( '<p class="invoice-download"><a class="invoice-download" href="%s">%s</a></p>', esc_attr( $pdf_url ), esc_html( $link_text ) );
    return $text;
}

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );

add_action( 'woocommerce_after_checkout_form', 'bbloomer_disable_shipping_local_pickup' );
   
function bbloomer_disable_shipping_local_pickup( $available_gateways ) {
     
   // Part 1: Hide shipping on checkout load
   $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
   $chosen_shipping = $chosen_methods[0];
   if ( 0 === strpos( $chosen_shipping, 'local_pickup' ) ) {
      wc_enqueue_js( "
         $('#ship-to-different-address input').prop('checked', false).change().closest('h3').hide();
      " );
   }
  
   // Part 2: Hide shipping on checkout shipping change 
   wc_enqueue_js( "
      $('form.checkout').on('change','input[name^=\"shipping_method\"]',function() {
         var val = $( this ).val();
         if (val.match('^local_pickup')) {
            $('#ship-to-different-address input').prop('checked', false).change().closest('h3').hide();
         } else {
            $('#ship-to-different-address input').prop('checked', true).change().closest('h3').show();
         }
      });
   " );  
}

// add_action('woocommerce_checkout_order_processed', 'remove_shipping_', 10, 1);

// function remove_shipping_( $order_id ) {

//     if(!$_POST['ship_to_different_address']) {
//         $order = new WC_Order($order_id);
//         $shipping_address = $order->get_address('shipping'); 
//         if($shipping_address) {
//             foreach($shipping_address as $key => $address) {
//                 update_post_meta($order_id, '_shipping_'.$key, '');
//             }
//         }
//     }   
// }

add_action('woocommerce_checkout_order_processed', 'remove_shipping_', 10, 1);
function remove_shipping_($order_id) {
    $mode = WC()->session->get('shipping_mode');
    
    // Run only if Free Collection is selected
    if ($mode === 'free') {
        $order = new WC_Order($order_id);
        $shipping_address = $order->get_address('shipping');
        if ($shipping_address) {
            foreach ($shipping_address as $key => $address) {
                update_post_meta($order_id, '_shipping_' . $key, '');
            }
        }
    }
}

// Lazy Load on Product Pages

function disable_js_delay_on_product_pages($tag) {
    if (is_product()) {
        return str_replace('data-rocket-delay', '', $tag);
    }
    return $tag;
}
add_filter('rocket_delay_js_html', 'disable_js_delay_on_product_pages');

// Repeat Customer Name and Count in Admin Orders 

add_filter('woocommerce_admin_order_buyer_name', 'add_repeat_customer_label_with_count', 10, 2);

function add_repeat_customer_label_with_count($buyer_name, $order) {
    $customer_email = $order->get_billing_email();

    // Get all completed, processing, and on-hold orders for this customer
    $customer_orders = wc_get_orders(array(
        'billing_email' => $customer_email,
        'limit' => -1,
        'status' => array('wc-completed', 'wc-processing', 'wc-on-hold')
    ));

    $order_count = count($customer_orders);

    if ($order_count > 1) {
        $buyer_name .= ' (OC - ' . $order_count . ' Orders)';
    }

    return $buyer_name;
}




//Ireland Shipping Notice

add_action('woocommerce_after_checkout_validation', function( $data, $errors ){
    // Get and normalize values
    $country  = isset($data['shipping_country']) ? strtoupper($data['shipping_country']) : '';
    $postcode = isset($data['shipping_postcode']) ? strtoupper(str_replace(' ', '', $data['shipping_postcode'])) : '';

    // 🔴 Blocked postcode prefixes
    $blocked_prefixes = [
        // Republic of Ireland (Eircodes)
        'A4','A6','A7','A8','A9','C15','D0','D1','D2','D3','D4','D5','D6','D6W','D7','D8','D9',
        'E2','E3','E4','E9','F1','F2','F3','F9','H1','H2','H3','H5','H6','H7',
        'N3','N4','N9','P1','P2','P3','P4','P5','P6','P7','P8','R1','R2','R3','R9',
        'T1','T2','T3','T4','T5','T6','T7','V1','V2','V3','V9','Y1','Y2','Y3','Y9',

        // Northern Ireland & UK Offshore Islands
        'BT', // Northern Ireland
        'IM', // Isle of Man
        'JE', // Jersey
        'GY', // Guernsey
        'HS', // Hebrides
        'IV', // Inverness & Scottish Highlands
        'KA27','KA28',
        'KW', // Kirkwall / Orkney
        'PA20','PA41','PA42','PA43','PA44','PA45','PA46','PA47','PA48','PA49',
        'PA60','PA61','PA62','PA63','PA64','PA65','PA66','PA67','PA68','PA69','PA70','PA71','PA72','PA73','PA74','PA75','PA76','PA77','PA78',
        'PH42','PH43','PH44',
        'ZE', // Shetland
        'PO30','PO31','PO32','PO33','PO34','PO35','PO36','PO37','PO38','PO39','PO40','PO41' // Isle of Wight
    ];

    // 🔍 Block if country is Ireland
    if ( $country === 'IE' ) {
        $errors->add( 'validation', __( 'Sorry, we do not deliver to Ireland.' ) );
        return;
    }

    // 🔍 Block if postcode starts with any of the prefixes
    foreach ( $blocked_prefixes as $prefix ) {
        if ( strpos( $postcode, $prefix ) === 0 ) {
            $errors->add( 'validation', __( 'Sorry, we do not deliver to this region or postcode.' ) );
            return;
        }
    }
}, 10, 2 );





// Limit Orders Per Page in Admin

function limit_orders_per_page( $query ) {
    if ( is_admin() && isset( $_GET['post_type'] ) && $_GET['post_type'] === 'shop_order' ) {
        $query->set( 'posts_per_page', 20 ); // Orders per page limit
    }
}
add_action( 'pre_get_posts', 'limit_orders_per_page' );

// Api Request Block

function block_fuelthemes_requests( $pre, $args, $url ) {
    if ( strpos( $url, 'my.fuelthemes.net' ) !== false ) {
        return new WP_Error( 'blocked', 'FuelThemes API requests are blocked.' );
    }
    return $pre;
}
add_filter( 'pre_http_request', 'block_fuelthemes_requests', 10, 3 );






// 1) Register the new status
// 1) Register new status & add to list (same as before)
add_action( 'init', 'wc_register_ready_for_pickup_status' );
function wc_register_ready_for_pickup_status() {
    register_post_status( 'wc-ready-for-pickup', array(
        'label'                     => _x( 'Ready for Pickup', 'Order status', 'woocommerce' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Ready for Pickup <span class="count">(%s)</span>',
                                                'Ready for Pickup <span class="count">(%s)</span>',
                                                'woocommerce' ),
    ) );
}
add_filter( 'wc_order_statuses', 'wc_add_ready_for_pickup_to_statuses' );
function wc_add_ready_for_pickup_to_statuses( $order_statuses ) {
    $new = array();
    foreach ( $order_statuses as $key => $label ) {
        $new[ $key ] = $label;
        if ( 'wc-on-hold' === $key ) {
            $new['wc-ready-for-pickup'] = _x( 'Ready for Pickup', 'Order status', 'woocommerce' );
        }
    }
    return $new;
}

// 2) When status goes to ready-for-pickup → email + SMS
add_action( 'woocommerce_order_status_ready-for-pickup', 'wc_notify_customer_click_collect_ready', 10, 1 );
function wc_notify_customer_click_collect_ready( $order_id ) {
    $order = wc_get_order( $order_id );
    // Only trigger for local_pickup orders
    foreach ( $order->get_items( 'shipping' ) as $ship ) {
        if ( 'local_pickup' !== $ship->get_method_id() ) {
            return;
        }
    }

    // 2A) Send email (as before)
$to      = $order->get_billing_email();
$order_no = $order->get_order_number();
$first_name = $order->get_billing_first_name();
$hold_until = date_i18n( 'j F Y', strtotime( '+7 days' ) );

// Build item details
$lines = [];
foreach ( $order->get_items() as $item ) {
    $name     = $item->get_name();
    $qty      = $item->get_quantity();
    $subtotal = wc_price( $item->get_total() );
    $lines[]  = sprintf( '%s × %d — %s', esc_html($name), $qty, $subtotal );
}
$item_details = implode( "<br>", $lines );

// Email subject
$subject = "Your parcel is ready to collect – Order #$order_no";

// HTML body with bold "Have a question?"
$body = sprintf(
    '<p>Hi %s,</p><br>
    <p>Your parcel is now ready to collect from <strong>BMS Technologies</strong>.</p>
    <p>The store will hold your parcel(s) until <strong>%s</strong>.</p>
    <p>Simply head to our store and show your order confirmation and ID to collect your parcel.</p><br>
    <p><strong>Item details:</strong><br>%s</p><br>
    <p><strong>Handy information:</strong><br>
    - To view our store opening times, <a href="https://www.bmstechnologies.co.uk/contact-us/">click here</a>.<br>
    - Please bring one form of ID with you such as your Nextpay, credit, or debit card.<br>
    - If your parcel isn’t collected by the above date, it will be returned.</p><br>
    <p><strong>Have a question?</strong></p>
    <p>Our Customer Service Team is here to help:<br>
    01684 298800 (option 1)</p>
    <p>We look forward to seeing you soon.<br>
    With thanks from,<br><br>
    The BMS Technologies Team</p>',
    esc_html($first_name),
    $hold_until,
    $item_details
);

// Send HTML email
wp_mail( $to, $subject, $body, [ 'Content-Type: text/html; charset=UTF-8' ] );



    // 2B) Send SMS via Twilio
    if ( ! class_exists( 'WC_Twilio_SMS' ) ) {
        // If you prefer raw API call, comment out above and uncomment below:
        $sid    = 'AC6e43df56f119c47d740b6785b346196c';
        $token  = '8548281567888bf53efd9717e436c8d4';
        $from   = '+1234567890'; // your Twilio number in E.164
        $to_sms = $order->get_billing_phone(); // make sure it's in E.164 format too

        $message = sprintf(
            "Hi %s, your order #%s is ready for pickup. Thanks!",
            $order->get_billing_first_name(),
            $order->get_order_number()
        );

        // Raw REST API call
        $response = wp_remote_post( "https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json", [
            'body'    => [
                'From' => $from,
                'To'   => $to_sms,
                'Body' => $message,
            ],
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode( "{$sid}:{$token}" ),
            ],
            'timeout' => 20,
        ] );
        // optionally: check wp_remote_retrieve_response_code($response) == 201
    }
}





add_filter('woocommerce_cart_item_name', 'show_coupon_discount_line_total', 10, 3);

function show_coupon_discount_line_total($product_name, $cart_item, $cart_item_key) {
    if (!is_cart()) return $product_name;

    // Line total before and after discount
    $line_subtotal = $cart_item['line_subtotal'];
    $line_total = $cart_item['line_total'];

    // Calculate the discount
    $discount = $line_subtotal - $line_total;

    if ($discount > 0) {
        $product_name .= '<div style="margin-top:4px; color:green; font-weight:bold; font-size:13px;">
            💰 You saved: ' . wc_price($discount) . '
        </div>';
    }

    return $product_name;
}



// ✅ Restricted SKUs aur minimum qty ek hi jagah define karo
function get_restricted_skus() {
    return array(
        'K3BA10120R','K3BA10120B','K3BA1006R','K3BA1006B',
        'K3BA1010B','K3BA1010R','K3BA1016B','K3BA1025B',
        'K3BA1016R','K3BA1025R','K3BA1035B','K3BA1035R',
        'K3BA1050B','K3BA1050R','K3BA1070B','K3BA1070R',
        'K3BA1095B','K3BA1095R'
    );
}
$min_qty = 10;

// ✅ Add to Cart + Cart Update validation
add_action( 'woocommerce_check_cart_items', function() use ($min_qty) {
    foreach ( WC()->cart->get_cart() as $item ) {
        $product = $item['data'];
        if ( in_array( $product->get_sku(), get_restricted_skus() ) && $item['quantity'] < $min_qty ) {
            wc_add_notice( 'SKU ' . $product->get_sku() . ' ke liye minimum quantity ' . $min_qty . ' hai.', 'error' );
        }
    }
});

// ✅ Product page quantity field enforce
add_filter( 'woocommerce_quantity_input_args', function( $args, $product ) use ($min_qty) {
    if ( in_array( $product->get_sku(), get_restricted_skus() ) ) {
        $args['min_value']   = $min_qty;
        $args['input_value'] = max( $args['input_value'], $min_qty );
    }
    return $args;
}, 10, 2 );





// Price ke turant baad "Buy Now" button add karna
add_action( 'woocommerce_after_shop_loop_item_title', 'custom_buy_now_button', 11 );
function custom_buy_now_button() {
    global $product;

    if ( ! $product ) return;

    // Price print karo
    if ( $price_html = $product->get_price_html() ) {
        //echo '<span class="price">' . $price_html . '</span>';

        // Buy Now button (sirf parent div .bmproducts.standard_battery.yeah me dikhega CSS ki wajah se)
        echo '<a href="' . esc_url( get_permalink( $product->get_id() ) ) . '"  data-quantity="1"  class="button batt"  rel="nofollow">Buy Now</a>';
    }
}



// 1 pound order restrictiomns


// Get numeric cart total
if ( ! function_exists( 'my_get_cart_total_numeric' ) ) {
    function my_get_cart_total_numeric() {
        if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
            return 0;
        }
        // Unformatted numeric total
        $raw_total = WC()->cart->get_total( 'edit' );
        return (float) wc_format_decimal( $raw_total, wc_get_price_decimals() );
    }
}

// Cart page: show error & disable proceed button visually
function my_block_minimum_five_pounds_on_cart() {
    $total = my_get_cart_total_numeric();
    if ( $total < 0.00 ) {
        wc_add_notice(
            __( 'Sorry, orders below £5 are not allowed. Please add more items.', 'your-textdomain' ),
            'error'
        );
    }
}
add_action( 'woocommerce_check_cart_items', 'my_block_minimum_five_pounds_on_cart' );

// Classic checkout: HARD STOP before order is created
function my_block_minimum_five_pounds_on_checkout( $data, $errors ) {
    $total = my_get_cart_total_numeric();
    if ( $total < 0.00 ) {
        $errors->add(
            'order_total_restriction',
            __( 'Sorry, orders below £5 are not allowed. Please add more items.', 'your-textdomain' )
        );
    }
}
add_action( 'woocommerce_after_checkout_validation', 'my_block_minimum_five_pounds_on_checkout', 10, 2 );





// Failer payment emails.

add_filter( 'woocommerce_email_enabled_failed_order', '__return_false' );



add_action( 'woocommerce_order_status_failed', 'my_force_send_failed_order_email', 10, 1 );

function my_force_send_failed_order_email( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        return;
    }

    // Get WooCommerce mailer and the Failed Order email class
    $mailer = WC()->mailer();
    $emails = $mailer->get_emails();

    if ( ! empty( $emails['WC_Email_Failed_Order'] ) ) {
        $emails['WC_Email_Failed_Order']->trigger( $order_id );
    }
}



// Hide Failed Orders

//Hide only failed orders from WooCommerce admin orders list
// function wc_hide_failed_orders_from_list( $query ) {
//     global $pagenow, $post_type;

//     if ( is_admin() && $pagenow === 'edit.php' && $post_type === 'shop_order' && isset( $query->query_vars['post_status'] ) ) {
//         // Remove "failed" from the list of visible statuses
//         if ( is_array( $query->query_vars['post_status'] ) ) {
//             $query->query_vars['post_status'] = array_diff( $query->query_vars['post_status'], array( 'wc-failed' ) );
//         }
//     }
// }
// add_action( 'pre_get_posts', 'wc_hide_failed_orders_from_list' );


// Fueltheme reqyuest block

/**
 * Stop FuelThemes (PeakShop) from making external API calls
 * This prevents slow loading caused by theme remote requests
 */
add_filter('pre_http_request', function($pre, $args, $url) {
    if (strpos($url, 'fuelthemes') !== false) {
        return true; // block the request completely
    }
    return $pre;
}, 10, 3);

/**
 * Optional: Disable FuelThemes update checker or license pings
 */
remove_action('init', 'fuelthemes_remote_check');
remove_action('admin_init', 'fuelthemes_update_checker');

// Product page trade button

/**
 * ✅ WooCommerce Product Custom Button (Enable + URL field)
 * Works in admin + shows on product page
 */

// 1️⃣ Add fields to product edit screen (General tab)
add_action('woocommerce_product_options_general_product_data', function() {
    global $woocommerce, $post;

    echo '<div class="options_group">';

    // Checkbox field
    woocommerce_wp_checkbox([
        'id'          => '_enable_custom_button',
        'label'       => __('Enable Custom Button', 'woocommerce'),
        'desc_tip'    => true,
        'description' => __('Check this box to show a custom button on the product page.', 'woocommerce'),
    ]);

    // Text field
    woocommerce_wp_text_input([
        'id'          => '_custom_button_url',
        'label'       => __('Custom Button URL', 'woocommerce'),
        'placeholder' => __('https://example.com', 'woocommerce'),
        'desc_tip'    => true,
        'description' => __('Enter the URL that the custom button should link to.', 'woocommerce'),
    ]);

    echo '</div>';
});

// 2️⃣ Save fields
add_action('woocommerce_process_product_meta', function($post_id) {
    $enable_button = isset($_POST['_enable_custom_button']) ? 'yes' : 'no';
    $custom_url    = isset($_POST['_custom_button_url']) ? sanitize_text_field($_POST['_custom_button_url']) : '';

    update_post_meta($post_id, '_enable_custom_button', $enable_button);
    update_post_meta($post_id, '_custom_button_url', $custom_url);
});

// 3️⃣ Show button on product page
add_action('woocommerce_single_product_summary', function() {
    global $product;

    $enable_button = get_post_meta($product->get_id(), '_enable_custom_button', true);
    $custom_url    = get_post_meta($product->get_id(), '_custom_button_url', true);

    if ($enable_button === 'yes' && !empty($custom_url)) {
        echo '<div class="custom-product-button" style="margin-top:15px;">';
        echo '<a href="' . esc_url($custom_url) . '" target="_blank" rel="noopener" class="single_add_to_cart_button button alt" style="">Login for your Trade price</a>';
        echo '</div>';
    }
}, 40);



// Account creation on checkout page

// add_action( 'template_redirect', 'force_login_before_checkout' );
// function force_login_before_checkout() {
//     if ( is_checkout() && ! is_user_logged_in() ) {
//         wp_redirect( wc_get_page_permalink( 'myaccount' ) );
//         exit;
//     }
// }


/**
 * 🚫 Hide shipping breakdown row from Thank You (Order Received) page
 * Keeps admin, email, and PDF invoice unaffected
 */
add_filter('woocommerce_get_order_item_totals', function($totals, $order) {
    if (is_order_received_page()) {
        // Remove "shipping" row from Thank You page only
        if (isset($totals['shipping'])) {
            unset($totals['shipping']);
        }
    }
    return $totals;
}, 999, 2);



/**
 * 🚫 Remove duplicate "Shipping" line from PDF Invoices (WP Overnight plugin)
 */
add_filter('wpo_wcpdf_order_totals', function($totals, $order, $document_type) {
    if ($document_type === 'invoice') {
        foreach ($totals as $key => $total) {
            if (isset($total['label']) && stripos($total['label'], 'shipping') !== false) {
                unset($totals[$key]);
            }
        }
    }
    return $totals;
}, 999, 3);




















/**
 * ✅ Full Shipping Logic (Always show VAT-inclusive price on frontend)
 */
add_action('woocommerce_cart_calculate_fees', 'bms_custom_shipping_logic', 20);
function bms_custom_shipping_logic($cart) {
	if (is_admin() && !defined('DOING_AJAX')) return;

	$mode = WC()->session->get('shipping_mode') ?: 'paid';

	// 🏠 Free Collection
	if ($mode === 'free') {
		$cart->add_fee(__('🏠 Free Collection from Tewkesbury', 'woocommerce'), 0, false);
		return;
	}

	// 🔹 Shipping class setup
	$rates = [
		'7-5'  => ['per_item' => 7.5, 'flat_over_5' => 45],
		'15'   => ['per_item' => 15],
		'48'   => ['flat' => 45],
		'90'   => ['flat' => 90],
		'1000' => ['under_15' => 7.5, 'over_15' => 15],
		'0-01' => ['flat' => 0],
	];

	$totals = [
		'7-5' => 0, '15' => 0, '48' => 0,
		'90' => 0, '1000' => 0, '0-01' => 0
	];
	$qtys = ['7-5' => 0, '15' => 0, '1000' => 0];
	$shipping_total = 0;

	// 🧾 Loop through cart
	foreach ($cart->get_cart() as $item) {
		$product = $item['data'];
		$qty     = $item['quantity'];
		$class   = $product->get_shipping_class();
		if (isset($totals[$class])) {
			$totals[$class] += $qty;
			if (isset($qtys[$class])) $qtys[$class] += $qty;
		}
	}

	// 🧮 Class 48 overrides 7.5
	if ($totals['48'] > 0) {
		$shipping_total += $rates['48']['flat'];
		$totals['7-5'] = 0;
	}

	// 🧮 Class 7.5
	if ($totals['7-5'] > 0) {
		$shipping_total += ($qtys['7-5'] <= 5)
			? $rates['7-5']['per_item'] * $qtys['7-5']
			: $rates['7-5']['flat_over_5'];
	}

	// 🧮 Class 15
	if ($totals['15'] > 0) {
		$shipping_total += $rates['15']['per_item'] * $qtys['15'];
	}

	// 🧮 Class 90
	if ($totals['90'] > 0) {
		$shipping_total += $rates['90']['flat'];
	}

	// 🧮 Class 1000
	if ($totals['1000'] > 0) {
		$shipping_total += ($qtys['1000'] > 15)
			? $rates['1000']['over_15']
			: $rates['1000']['under_15'];
	}

	// 🧮 Class 0.01
	if ($totals['0-01'] > 0) {
		$shipping_total += $rates['0-01']['flat'];
	}

	// 💷 VAT rate
	$tax_rate = 0.20;
	$label = '🚚 Standard Shipping';

	// Store for frontend display
	WC()->session->set('bms_shipping_total_display', round($shipping_total, 2));

	// 💡 Add fee EX VAT for backend (so WooCommerce handles tax automatically)
	$shipping_ex_vat = round($shipping_total / (1 + $tax_rate), 2);
	$cart->add_fee($label, $shipping_ex_vat, true, 'standard');
}

/**
 * 💾 Save correct label in backend/invoice
 */
add_action('woocommerce_checkout_create_order_shipping_item', function($item, $package_key, $package, $order) {
	$mode = WC()->session ? WC()->session->get('shipping_mode') : 'paid';
	if ($mode === 'free') {
		$item->set_method_title('🏠 Free Collection from Tewkesbury');
		$item->set_method_id('free_collection');
	} else {
		$item->set_method_title('🚚 Standard Shipping');
		$item->set_method_id('standard_shipping');
	}
}, 10, 4);

/**
 * 🎨 Frontend Display — Force show VAT-inclusive value (£7.50)
 */
add_filter('woocommerce_cart_totals_fee_html', function($html, $fee) {
	if (strpos($fee->name, 'Standard Shipping') !== false) {
		$tax_rate = 0.20;
		$incl_vat = round($fee->amount * (1 + $tax_rate), 2);
		return wc_price($incl_vat) . ' <small>(incl. VAT)</small>';
	}
	return $html;
}, 20, 2);



/**
 * 🎨 FRONTEND FIX — Force show VAT-inclusive shipping in Cart, Checkout & Thank You
 */

add_filter('woocommerce_get_order_item_totals', function($totals, $order) {
	foreach ($totals as $key => &$row) {
		if (
			stripos($key, 'fee') !== false &&
			stripos($row['label'], 'Shipping') !== false &&
			isset($order->get_items('fee')[0])
		) {
			foreach ($order->get_items('fee') as $item) {
				if (strpos($item->get_name(), 'Shipping') !== false) {
					$tax_rate = 0.20;
					$amount = (float) $item->get_total();
					$incl_vat = $amount * (1 + $tax_rate);
					$row['value'] = wc_price($incl_vat) . ' <small>(incl. VAT)</small>';
					break;
				}
			}
		}
	}
	return $totals;
}, 20, 2);










/**
 * 🧭 Shipping Mode Selector (Free / Paid)
 * Works on both Cart & Checkout + Shows total shipping amount
 */
add_action('woocommerce_cart_totals_before_shipping', 'custom_shipping_mode_selector');
add_action('woocommerce_checkout_before_customer_details', 'custom_shipping_mode_selector');

function custom_shipping_mode_selector() {
    $mode = WC()->session->get('shipping_mode') ?: 'paid';

    // 🧮 Calculate total current shipping charges from cart fees
    $cart_fees = WC()->cart->get_fees();
    $shipping_total = 0;
    foreach ($cart_fees as $fee) {
        // We only want to sum fees that have "Shipping" in their name
        if (stripos($fee->name, 'shipping') !== false) {
            $shipping_total += $fee->amount;
        }
    }

    // 🏷 Format nicely for display (like £45.00)
    $formatted_total = $shipping_total > 0 ? wc_price($shipping_total) : __('£0.00', 'woocommerce');
    ?>
    <div class="custom-shipping-mode" style="margin:15px 0 25px;">
        <h5 style="margin-bottom:10px;">Select Shipping Method</h5>

        <label style="display:block; margin-bottom:8px;">
            <input type="radio" name="shipping_mode" id="paid" value="paid" <?php checked($mode, 'paid'); ?>>
            🚚 <strong>Standard Shipping</strong> — <strong><?php echo $formatted_total; ?></strong>
            <p class="shipping-method-description">
	Delivery 1-2 working days</p>
        </label>

        <label style="display:block;">
            <input type="radio" name="shipping_mode" id="free" value="free" <?php checked($mode, 'free'); ?>>
            🏠 <strong>Free Collection from Tewkesbury</strong>
        </label>

        <p style="font-size:13px; margin-top:8px;">
            📍 <a href="https://www.google.com/maps/place/BMS+Technologies+LTD/@52.0003207,-2.1234907,536m/data=!3m2!1e3!4b1!4m6!3m5!1s0x4870e2a0bf934bc1:0xaa08c32d79954c93!8m2!3d52.0003208!4d-2.1186198!16s%2Fg%2F1wk4chqt?entry=ttu"
               target="_blank"
               style="text-decoration:underline;color:#009500;">Collection Address</a>
        </p>
    </div>

    <script type="text/javascript">
    jQuery(function($){
        $('body').on('change', 'input[name="shipping_mode"]', function(){
            var mode = $(this).val();
            // ✅ Use WooCommerce built-in AJAX endpoint (works on both Cart & Checkout)
            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'set_shipping_mode',
                    mode: mode
                },
                success: function() {
                    // 🔁 Refresh totals dynamically
                    $('body').trigger('update_checkout');
                    $('.woocommerce-cart-form').trigger('submit'); // for cart page
                }
            });
        });
    });
    </script>
    <?php
}

/**
 * 🧩 Save selected mode in WooCommerce session (AJAX)
 */
add_action('wp_ajax_set_shipping_mode', 'custom_set_shipping_mode');
add_action('wp_ajax_nopriv_set_shipping_mode', 'custom_set_shipping_mode');

function custom_set_shipping_mode() {
    if (isset($_POST['mode'])) {
        WC()->session->set('shipping_mode', sanitize_text_field($_POST['mode']));
    }
    wp_die();
}























/**
 * 🧠 Disable shipping requirement when Free Collection is selected
 */
// add_filter('woocommerce_cart_needs_shipping', function($needs_shipping) {
//     $mode = WC()->session->get('shipping_mode');
//     if ($mode === 'free') {
//         return false; // 🏠 No shipping required
//     }
//     return $needs_shipping;
// });

/**
 * 🧹 Make shipping fields optional when Free Collection selected
 */
/**
 * 🧹 Make shipping fields optional when Free Collection selected
 * ✅ Safe version (keeps form data intact)
 */
add_filter('woocommerce_checkout_fields', function($fields) {
    $mode = WC()->session->get('shipping_mode') ?: 'paid';

    foreach ($fields['shipping'] as &$field) {
        $field['required'] = ($mode === 'paid');
    }

    return $fields;
});




/**
 * 🚀 Show/Hide shipping form dynamically based on Free/Paid radio buttons
 * ✅ Data-safe version + friendly message
 */
add_action('wp_footer', function() {
    if (is_checkout()) : ?>
    <script type="text/javascript">
    jQuery(function($){

        function toggleShippingForm() {
            const isFree = $('#free').is(':checked');
            const isPaid = $('#paid').is(':checked');

            if (isFree) {
                // 🏠 Free Collection selected → hide form (no data cleared)
                $('#ship-to-different-address').hide();
                $('.shipping_address').stop(true, true).slideUp(300);

                if ($('#order_comments').val().trim() === '') {
                    $('#order_comments').val('Click and collect');
                }

                // Add green info message if not exists
                if (!$('.free-note').length) {
                    $('<p class="free-note">You have selected Free Collection — no shipping details needed.</p>')
                        .insertAfter('.woocommerce-billing-fields');
                }
            } 
            else if (isPaid) {
                // 🚚 Paid Shipping selected → show again
                $('#ship-to-different-address').show();
                $('.shipping_address').stop(true, true).slideDown(300);
                if ($('#order_comments').val().trim() === 'Click and collect') {
                    $('#order_comments').val('');
                }
                $('.free-note').remove();
            }
        }

        // Initial run after checkout loads
        setTimeout(toggleShippingForm, 800);

        // Change event
        $(document).on('change', 'input[name="shipping_mode"]', toggleShippingForm);

        // Recheck after checkout updates
        $(document.body).on('updated_checkout', function() {
            setTimeout(toggleShippingForm, 400);
        });
    });
    </script>
    <?php endif;
});












/**
 * ✅ Show "Click & Collect" or "Shipping" label after order number
 * Works in Admin, Emails, and Thank You page
 */
add_filter('woocommerce_order_number', function($order_number, $order) {

    // Try reading shipping_mode from order meta first
    $mode = $order->get_meta('shipping_mode');

    // If meta not found (for older orders), fallback to session
    if (!$mode && WC()->session) {
        $mode = WC()->session->get('shipping_mode');
    }

    // Default to paid if still empty
    if (!$mode) {
        $mode = 'paid';
    }

    // Choose label text
    $label = ($mode === 'free') ? '(C & C)' : '(Shipping)';

    // Return formatted order number
    return sprintf('%s — %s', $order_number, $label);

}, 10, 2);


/**
 * 💾 Save shipping_mode in order meta when checkout runs
 */
add_action('woocommerce_checkout_create_order', function($order) {
    if (WC()->session) {
        $mode = WC()->session->get('shipping_mode') ?: 'paid';
        $order->update_meta_data('shipping_mode', $mode);
    }
});








/**
 * 🏠 Cleanly handle Shipping vs Free Collection in saved orders
 * Removes shipping item for Free Collection and renames Paid ones
 */
add_action('woocommerce_checkout_create_order_shipping_item', function($item, $package_key, $package, $order) {

    $mode = WC()->session ? WC()->session->get('shipping_mode') : 'paid';

    // 🚫 Free Collection: don't save any shipping item
    if ($mode === 'free') {
        $order->remove_item($item->get_id()); // remove shipping line
        $order->update_meta_data('_shipping_mode', 'free');
        return;
    }

    // 🚚 Paid Shipping: rename nicely
    $item->set_method_title('🚚 Standard Shipping');
    $item->set_method_id('standard_shipping');
    $order->update_meta_data('_shipping_mode', 'paid');

}, 10, 4);





// 🔧 WooCommerce Admin Edit Order Page: Remove "Shipping" row and rename "Fees" to "Shipping"
add_action( 'admin_footer', function() {
    global $pagenow;

    // Run only on WooCommerce Edit Order page
    if ( 'post.php' === $pagenow && get_post_type() === 'shop_order' ) : ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {

            if ( $('body.post-type-shop_order').length ) {

                // Function to modify totals
                function modifyTotals() {
                    $('.wc-order-totals td.label').each(function() {
                        let text = $(this).text().trim();

                        // Remove Shipping row
                        if (text.includes('Shipping')) {
                            $(this).closest('tr').remove();
                        }

                        // Change "Fees:" to "Shipping:"
                        if (text.includes('Fees')) {
                            $(this).text('Shipping:');
                        }
                    });
                }

                // Run once when page loads
                modifyTotals();

                // Observe changes (WooCommerce reloads totals via AJAX)
                const targetNode = document.querySelector('.wc-order-totals');
                if (targetNode) {
                    const observer = new MutationObserver(function(mutationsList, observer) {
                        modifyTotals();
                    });
                    observer.observe(targetNode, { childList: true, subtree: true });
                }
            }

        });
        </script>
    <?php
    endif;
});
















/**
 * 🚚 Clean Shipping + VAT Display (removes duplicate & hides Fees)
 * Works for: WooCommerce totals + PDF Invoices (WP Overnight)
 */
add_filter('woocommerce_get_order_item_totals', function($totals, $order) {
    $mode = $order->get_meta('shipping_mode') ?: 'paid';
    $fees = $order->get_fees();

    // 1️⃣ Remove existing shipping and fee rows
    unset($totals['shipping']);
    unset($totals['fee']);
    unset($totals['fees']);

    // 🏠 Free Collection
    if ($mode === 'free') {
        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => '🏠 Free Collection from Tewkesbury (£0.00)',
        ];
        return $totals;
    }

    // 🚚 Standard Shipping
    $shipping_total = 0;
    foreach ($fees as $fee) {
        $shipping_total += (float) $fee->get_total();
    }

    if ($shipping_total > 0) {
        // ✅ $shipping_total is EX VAT → calculate correct VAT
        $tax_rate = 0.20;
        $base = round($shipping_total, 2);
        $vat  = round($base * $tax_rate, 2);

        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => sprintf('🚚 Standard Shipping — £%.2f + £%.2f VAT', $base, $vat),
        ];
    }

    return $totals;
}, 100, 2);


/**
 * 🧾 Fix for PDF Invoices (Remove duplicate + correct VAT)
 */
add_filter('wpo_wcpdf_order_totals', function($totals, $order) {
    $mode = $order->get_meta('shipping_mode') ?: 'paid';
    $fees = $order->get_fees();

    // 1️⃣ Remove default & fee rows
    foreach ($totals as $key => $row) {
        if (strpos(strtolower($key), 'fee') !== false || $key === 'shipping') {
            unset($totals[$key]);
        }
    }

    // 🏠 Free Collection
    if ($mode === 'free') {
        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => '🏠 Free Collection from Tewkesbury (£0.00)',
        ];
        return $totals;
    }

    // 🚚 Standard Shipping (Correct VAT)
    $shipping_total = 0;
    foreach ($fees as $fee) {
        $shipping_total += (float) $fee->get_total();
    }

    if ($shipping_total > 0) {
        $tax_rate = 0.20;
        $base = round($shipping_total, 2);
        $vat  = round($base * $tax_rate, 2);

        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => sprintf('🚚 Standard Shipping — £%.2f + £%.2f VAT', $base, $vat),
        ];
    }

    return $totals;
}, 100, 2);


/**
 * 🧾 Fix for PDF Invoices (Prevent double Shipping + remove Fees)
 */
add_filter('wpo_wcpdf_order_totals', function($totals, $order) {
    $mode = $order->get_meta('shipping_mode') ?: 'paid';
    $fees = $order->get_fees();

    // Remove duplicate or fee lines
    foreach ($totals as $key => $row) {
        if (strpos(strtolower($key), 'fee') !== false || $key === 'shipping') {
            unset($totals[$key]);
        }
    }

    // 🏠 Free Collection
    if ($mode === 'free') {
        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => '🏠 Free Collection from Tewkesbury (£0.00)',
        ];
        return $totals;
    }

    // 🚚 Paid Shipping breakdown
    $shipping_total = 0;
    foreach ($fees as $fee) {
        $shipping_total += (float) $fee->get_total();
    }

    if ($shipping_total > 0) {
        $tax_rate = 0.20;

        // ✅ Treat $shipping_total as EX VAT
        $base = round($shipping_total, 2);
        $vat  = round($base * $tax_rate, 2);

        $totals['shipping'] = [
            'label' => __('Shipping', 'woocommerce'),
            'value' => sprintf('🚚 Standard Shipping — £%.2f + £%.2f VAT', $base, $vat),
        ];
    }

    return $totals;
}, 100, 2);





/**
 * ✅ Redirect ONLY the “Proceed to Checkout” button → /user-account/
 * Safe for all WooCommerce themes and AJAX reloads
 */
add_action('wp_footer', function() {
	if ( is_cart() && ! is_admin() ) : ?>
	<script type="text/javascript">
	jQuery(document).ready(function($){

		// ✅ Function to attach redirect ONLY to checkout buttons
		function overrideCheckoutButtons() {
			$('a.checkout-button, button.checkout-button').each(function(){
				$(this).attr('href', '<?php echo esc_url( site_url('/user-account/') ); ?>');
				$(this).off('click.cartRedirect').on('click.cartRedirect', function(e){
					e.preventDefault();
					window.location.href = '<?php echo esc_url( site_url('/user-account/') ); ?>';
				});
			});
		}

		// Run once on page load
		overrideCheckoutButtons();

		// Reapply after WooCommerce AJAX fragment updates (quantities, coupons, etc.)
		$(document.body).on('updated_wc_div', overrideCheckoutButtons);
	});
	</script>
	<?php endif;
});



/**
 * 🚫 Block direct access to Checkout page
 * Redirect users to /user-account/ unless they came from that page
 * (But allow Thank You page after successful order)
 */
add_action('template_redirect', function() {
	// ✅ Apply only to checkout, NOT thank-you/order received page
	if ( is_checkout() && ! is_order_received_page() && ! is_user_logged_in() ) {

		// Get previous page URL
		$referrer = wp_get_referer();

		// ✅ Allow only if they came from /user-account/
		if ( empty($referrer) || strpos($referrer, 'user-account') === false ) {
			wp_safe_redirect( site_url('/user-account/') );
			exit;
		}
	}
});



// Bots checkout field

add_action( 'woocommerce_after_checkout_billing_form', function() {
    echo '<div style="display:none;">
        <label for="anti_bot_field">Leave this field empty</label>
        <input type="text" name="anti_bot_field" id="anti_bot_field" value="">
    </div>';
});

add_action( 'woocommerce_checkout_process', function() {
    if ( ! empty( $_POST['anti_bot_field'] ) ) {
        wc_add_notice( 'Bot detected. Please try again.', 'error' );
    }
});



