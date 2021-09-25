<?php
/**
 * Header 4 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area">
	<div class="tipi-flex-lcr logo-main-wrap header-padding tipi-flex-eq-height logo-main-wrap-center<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?>">
		<div class="logo-main-wrap header-padding tipi-all-c">
			<?php zeen_logo(); ?>
		</div>
		<?php zeen_ad( 'header' ); ?>
		<?php zeen_cta( 'header' ); ?>
	</div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
