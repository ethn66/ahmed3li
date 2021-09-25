<?php
/**
 * Header 7 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area">
	<div class="logo-main-wrap-l logo-main-wrap header-padding tipi-vertical-c<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?>"><?php
		zeen_logo();
		zeen_ad( 'header' );
		zeen_cta( 'header' );
	?></div>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
