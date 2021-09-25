<?php
/**
 * Slide Filter 1
 *
 * @package Zeen
 * @since 4.0.0
 */
?>
<?php
if ( zeen_woo_active() && zeen_woo_filters_on() ) :
	$filters = is_active_sidebar( 'woocommerce-filters' );
	if ( ! empty( $filters ) ) {
		?>
		<div id="woo-filters" class="woo-filters slide-in-woo clearfix slide-in-el site-skin-<?php echo intval( zeen_skin_style( 'woo_filters' ) ); ?> site-img-<?php echo intval( zeen_skin_style( 'woo_filters', 'repeat' ) ); ?> tipi-tile-cart">
			<div class="bg-area">
				<div class="content clearfix">
					<h4 class="slide-in-woo-header filter--title tipi-vertical-c">
						<?php esc_html_e( 'Filter', 'zeen' ); ?>
						<a href="#" class="modal-tr-close close tipi-close-icon">Close (×)</a>
					</h4>
					<aside id="woo-filters-widgets" class="sidebar widget-area">
						<?php
						if ( class_exists( 'WC_Widget_Layered_Nav_Filters' ) ) {
							the_widget(
								'WC_Widget_Layered_Nav_Filters',
								array( 'title' => 'Active' ),
								array(
									'before_widget' => '<div class="filters-widget tipi-vertical-c clearfix %s">',
									'after_widget'  => '</div>',
									'before_title'  => '<h3 class="widget-title title">',
									'after_title'   => '</h3>',
								)
							);
						}
						?>
						<?php zeen_woo_catalog_ordering(); ?>
						<?php dynamic_sidebar( 'woocommerce-filters' ); ?>
					</aside>
				</div>
				<?php zeen_elem_bg_area( 'slide_cart' ); ?>
			</div>

		</div>
		<?php
	}
endif;
