<?php
/**
 * Footer widget area mob 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="footer-widget-bg-area-inner tipi-flex <?php if ( 1 == get_theme_mod( 'footer_width', 1 ) ) { echo 'tipi-row '; } ?>footer-widget-mob-area tipi-xs-12 tipi-m-0 clearfix">
	<div class="tipi-xs-12 footer-widget-wrap footer-widget-wrap-1 clearfix">
		<aside class="sidebar widget-area">
			<?php dynamic_sidebar( 'footer-mob' ); ?>
		</aside><!-- .sidebar .widget-area -->
	</div>
</div><!-- .footer-widget-area -->
