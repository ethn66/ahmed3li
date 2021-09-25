<?php
/**
 * Footer widget area 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$widget_style = get_theme_mod( 'footer_widgets_style', 3 );
$sidebar_1 = is_active_sidebar( 'footer-1' );
if ( $widget_style > 1 ) {
	$sidebar_2 = is_active_sidebar( 'footer-2' );
}
if ( $widget_style > 2 ) {
	$sidebar_3 = is_active_sidebar( 'footer-3' );
}
if ( $widget_style > 5 ) {
	$sidebar_4 = is_active_sidebar( 'footer-4' );
}
$lower_skin = zeen_skin_style( 'footer_lower' );
$mob_cols = get_theme_mod( 'footer_widgets_columns_mobile', 1 ) == 2 ? 'tipi-xs-6' : 'tipi-xs-12';
if ( ! empty( $sidebar_1 ) || ! empty( $sidebar_2 ) || ! empty( $sidebar_3 ) || ! empty( $sidebar_4 ) || is_active_sidebar( 'footer-mob' ) ) :
?>
<div class="footer-widget-area footer-widget-bg-area footer-widgets tipi-xs-12 clearfix footer-widget-area-<?php echo (int) $widget_style; ?> footer-widgets-skin-<?php echo (int) zeen_skin_style( 'footer_widgets', 'skin', 3 ); ?> site-img-<?php echo (int) zeen_skin_style( 'footer_widgets', 'repeat' ); ?>">
	<?php
	$mob_widgets = '';
	if ( is_active_sidebar( 'footer-mob' ) ) {
		$mob_widgets = ' tipi-xs-0';
		get_template_part( 'template-parts/footer/footer-widget-mob', 1 );
	}
	?>
	<div class="footer-widget-bg-area-inner tipi-flex <?php if ( 1 == get_theme_mod( 'footer_width', 1 ) ) { echo 'tipi-row'; } ?><?php echo esc_attr( $mob_widgets ); ?>">
		<?php if ( ! empty( $sidebar_1 ) ) : ?>
			<div class="<?php echo esc_attr( $mob_cols ); ?> footer-widget-wrap footer-widget-wrap-1 clearfix">
				<aside class="sidebar widget-area">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</aside><!-- .sidebar .widget-area -->
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $sidebar_2 ) ) : ?>
			<div class="<?php echo esc_attr( $mob_cols ); ?> footer-widget-wrap footer-widget-wrap-2 clearfix<?php if ( 2 == $widget_style ) { echo ' footer-widget-wrap-last'; } ?>">
				<aside class="sidebar widget-area">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</aside><!-- .sidebar .widget-area -->
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $sidebar_3 ) ) : ?>
			<div class="<?php echo esc_attr( $mob_cols ); ?> footer-widget-wrap footer-widget-wrap-3 clearfix<?php if ( 6 != $widget_style ) { echo ' footer-widget-wrap-last'; } ?>">
				<aside class="sidebar widget-area">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</aside><!-- .sidebar .widget-area -->
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $sidebar_4 ) ) : ?>
			<div class="<?php echo esc_attr( $mob_cols ); ?> footer-widget-wrap footer-widget-wrap-4 clearfix<?php if ( 6 == $widget_style ) { echo ' footer-widget-wrap-last'; } ?>">
				<aside class="sidebar widget-area">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</aside><!-- .sidebar .widget-area -->
			</div>
		<?php endif; ?>
	</div><!-- .footer-widget-area -->
	<?php zeen_elem_bg_area( 'footer_widgets' );	?>
</div><!-- .footer-widget-area -->
<?php
endif;
