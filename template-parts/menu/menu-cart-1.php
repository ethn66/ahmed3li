<?php
/**
 * Slide Cart 1
 *
 * @package Zeen
 * @since 4.0.0
 */

?>
<?php if ( zeen_woo_active() && get_theme_mod( 'woo_ajax_cart_style', 1 ) == 2 ) : ?>
<div id="slide-in-cart" class="slide-in-cart slide-in-woo slide-in-el site-skin-<?php echo intval( zeen_skin_style( 'slide_cart' ) ); ?> site-img-<?php echo intval( zeen_skin_style( 'slide_cart', 'repeat' ) ); ?> tipi-tile-cart tipi-xs-0">
	<div class="bg-area">
		<div class="content clearfix">
			<h3 class="slide-in-woo-header cart--title tipi-vertical-c">
				<?php esc_html_e( 'My Cart', 'zeen' ); ?>
				<a href="#" class="modal-tr-close close tipi-close-icon">Close (×)</a>
			</h3>
			<?php zeen_woo_contents( array( 'location' => 'slide' ) ); ?>
		</div>
		<?php zeen_elem_bg_area( 'slide_cart' ); ?>
	</div>
</div>
<?php endif; ?>
