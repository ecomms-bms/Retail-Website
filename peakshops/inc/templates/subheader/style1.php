<?php
	$classes[] = 'subheader style1';
	$classes[] = ot_get_option( 'subheader_color', 'light' );
	$classes[] = 'subheader-mobile-' . ot_get_option( 'subheader_mobile', 'off' );

	$subheader_left_sections  = ot_get_option( 'subheader_left_sections' );
	$subheader_center_sections  = ot_get_option( 'subheader_center_sections' );
	$subheader_right_sections = ot_get_option( 'subheader_right_sections' );
?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="row">
		<div class="small-12 medium-3 columns subheader-leftside">
			<?php do_action( 'thb_subheader_sections', $subheader_left_sections ); ?>
		</div>
		<div class="small-12 medium-6 columns subheader-center">
			<?php do_action( 'thb_subheader_sections', $subheader_center_sections ); ?>
		</div>		
		<div class="small-12 medium-3 columns subheader-rightside">
			<?php do_action( 'thb_subheader_sections', $subheader_right_sections ); ?>
		</div>
	</div>
</div>
