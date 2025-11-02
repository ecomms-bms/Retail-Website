<?php
$mobile_header_style    = ot_get_option( 'mobile_header_style', 'style1' );
$fixed_header_fullwidth = ot_get_option( 'fixed_header_fullwidth', 'on' );
$header_class[]         = 'header fixed fixed-style1';
if ( 'on' === $fixed_header_fullwidth ) {
	$header_class[] = 'header-full-width';
}
$header_class[] = 'fixed-header-full-width-' . $fixed_header_fullwidth;
$header_class[] = ot_get_option( 'header_color', 'light-header' );
$header_class[] = ot_get_option( 'fixed_header_shadow', 'thb-fixed-shadow-style1' );
$header_class[] = 'mobile-header-' . $mobile_header_style;
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="header-menu-row">
		<div class="row align-middle 
		<?php
		if ( 'on' === $fixed_header_fullwidth ) {
			?>
			full-width-row<?php } ?>">
			<?php if ( 'style1' === $mobile_header_style ) { ?>
				<div class="small-2 medium-3 columns hide-for-large">
					<?php do_action( 'thb_mobile_toggle' ); ?>
				</div>
				<div class="small-8 medium-6 large-10 columns mobile-logo-column">
					<div class="fixed-logo-holder ">
						<?php do_action( 'thb_mobile_toggle' ); ?>
						<?php do_action( 'thb_logo', 'fixed-logo' ); ?>
					</div>
					<?php do_action( 'thb_product_searchform', '9998' ); ?>
					<div class="large-3 columns hide-for-small reg-lookup">
<form id="bmstore_vrm_search" class="bmstore-vrm-search fxd" action="/batteries" method="GET"  style="border: 1px solid #ddd;">
<span class="gb-icon"><img src="/wp-content/uploads/2024/04/gb-icon_new.png" alt=""></span>
<input type="text" name="vrm" placeholder="Enter Reg" id="bmstore_search_input" class="bmstore-search-input">
<button  id="regcheck" aria-label="regcheck" type="submit" aria-label="Search via registration plate number">GO</button>
</form>
</div>
				</div>
				<div class="small-2 medium-3 large-2 columns">
					<?php do_action( 'thb_secondary_area', false, true ); ?>
				</div>
				
			<?php } else { ?>
				<div class="small-12 columns">
					<div class="thb-navbar">
						<div class="fixed-logo-holder">
							<?php do_action( 'thb_mobile_toggle' ); ?>
							<?php do_action( 'thb_logo', 'fixed-logo' ); ?>
						</div>
						<?php do_action( 'thb_product_searchform', '9998' ); ?>
						<?php do_action( 'thb_secondary_area', false, true ); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</header>
