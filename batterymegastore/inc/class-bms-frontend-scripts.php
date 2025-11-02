<?php

/**

 * Load frontend scripts

 *

 * @package BMS

 */



defined( 'ABSPATH' ) || exit;



/**

 * BMS_Frontend_Scripts class.

 */

class BMS_Frontend_Scripts {



	/**

	 * The single instance of the class

	 *

	 * @var BMS_Frontend_Scripts

	 */

	private static $instance = null;



	/**

	 * Hook in methods.

	 */

	private function __construct() {

        add_action( 'wp_head', array( $this, 'print_directly_to_head' ) );

		add_action( 'wp_body_open', array( $this, 'print_directly_to_body_open' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );

        add_filter( 'script_loader_tag', array( $this, 'add_props_to_script_tags' ), 10, 2 );

	}



	/**

	 * Register all CTP scripts.

	 */

	protected function register_scripts() {

        $thb_theme_version = Thb_Theme_Admin::$thb_theme_version;



    $register_scripts = array(

        'bms-js' => array(

          'src'     => get_stylesheet_directory_uri() . '/assets/js/child-scripts.js',

          'deps'    => array( 'thb-app' ),

          'version' => esc_attr( $thb_theme_version )

        ),

        'googletagmanager' => array(

          'src'       => 'https://www.googletagmanager.com/gtag/js?id=G-NZ1KHNNL34',

          'deps'      => array(),

          'version'   => null,

          'in_footer' => false

        ),

        'gtag'   => array(

          'src'       => get_stylesheet_directory_uri() . '/assets/js/gtag.js',

          'deps'      => array( 'googletagmanager' ),

          'version'   => '2023.04.18.1',

          'in_footer' => false

        ),

        'gtag-contact-us' => array(

          'src'     => get_stylesheet_directory_uri() . '/assets/js/gtag-contact-us.js',

          'deps'    => array(),

          'version' => esc_attr( $thb_theme_version )

        ),

        'custom' => array(

          'src'     => get_stylesheet_directory_uri() . '/assets/js/custom-v3.js',

          'deps'    => array(),

          'version' => esc_attr( $thb_theme_version )

        )

    );



		foreach ( $register_scripts as $name => $props ) {

			wp_register_script( $name, $props['src'], $props['deps'], $props['version'], array_key_exists( 'in_footer', $props ) ? $props['in_footer'] : true );

		}

	}



	/**

	 * Print <meta> and other tags directly to <head>.

	 */

    public function print_directly_to_head() {

        

		echo "<!-- Google Tag Manager -->

		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

		})(window,document,'script','dataLayer','GTM-MML4D3H');</script>

		<!-- End Google Tag Manager -->";

    }



	public function print_directly_to_body_open() {

		echo "<!-- Google Tag Manager (noscript) -->

		<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-MML4D3H\"

		height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>

		<!-- End Google Tag Manager (noscript) -->";

	}



	/**

	 * Register/queue frontend scripts.

	 */

	public function load_scripts() {



		$this->register_scripts();



        wp_enqueue_script( 'googletagmanager' );

        wp_enqueue_script( 'gtag' );

        if ( is_product() || is_product_category() ) {
          wp_enqueue_script( 'bms-js' );
        }



        if ( is_product() ) {

            wp_enqueue_script( 'product' );



        } elseif( is_page( 'contact-us' ) ) {

            wp_enqueue_script( 'gtag-contact-us' );

        }



		$version = filemtime( get_stylesheet_directory() . '/assets/css/custom-v1.css' );

        wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/assets/css/custom-v1.css', array(), $version );

        wp_enqueue_script( 'custom' );

        wp_localize_script('custom', 'BMS_CART', array(

          'isCart' => is_cart() || is_checkout(),

          'isProduct' => is_product(),
          'isCategory' => is_product_category()

        ));

	}



	/**

	 * Add props to <script> tags, such as async and defer.

	 *

	 * @param string $tag    The <script> tag for the enqueued script.

	 * @param string $handle The script's registered handle.

	 * @return string

	 */

	function add_props_to_script_tags( $tag, $handle ) {



        if ( in_array( $handle, array( 'googletagmanager' ), true ) ) {

			$tag = str_replace( '<script ', '<script async ', $tag );

		}			



		return $tag;

	}



	/**

	 * BMS_Frontend_Scripts Instance.

	 *

	 * Ensures only one instance of BMS_Frontend_Scripts is loaded or can be loaded.

	 *

	 * @static

	 *

	 * @return BMS_Frontend_Scripts - Main instance.

	 */

	public static function instance() {



		if ( is_null( self::$instance ) ) {



			self::$instance = new self();

		}

		return self::$instance;

	}

}



BMS_Frontend_Scripts::instance();

