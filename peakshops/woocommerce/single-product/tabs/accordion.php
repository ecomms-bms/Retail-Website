<?php
	$product_tabs            = apply_filters( 'woocommerce_product_tabs', array() );
	$shop_product_tab_scroll = 'on' === ot_get_option( 'shop_product_tab_scroll', 'off' ) ? 'true' : false;
?>
<div class="thb-accordion style1 has-accordion" data-scroll="<?php echo esc_attr( $shop_product_tab_scroll ); ?>">
	<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
	<div class="vc_tta-panel <?php echo esc_attr( $key ); ?>_tab" id="tab-<?php echo esc_attr( $key ); ?>">
		<div class="vc_tta-panel-heading">
		<h4><a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></a></h4>
		</div>
		<div class="vc_tta-panel-body wc-tab woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?>">
		<?php
		if ( isset( $product_tab['callback'] ) ) {
			call_user_func( $product_tab['callback'], $key, $product_tab );
		}
		?>
		</div>
	</div>
	<?php endforeach; ?>
</div>
