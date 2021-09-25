<?php
/**
 * Slide Menu 1
 *
 * @package Zeen
 * @since 1.0.0
 */

?>
<?php if ( is_active_sidebar( 'slide-menu' ) || get_theme_mod( 'main_menu_icon_slide' ) == 1 || get_theme_mod( 'secondary_menu_icon_slide' ) == 1 ) : ?>
<div id="slide-in-menu" class="slide-in-menu slide-in-el site-skin-<?php echo intval( zeen_skin_style( 'slide' ) ); ?> site-img-<?php echo intval( zeen_skin_style( 'slide', 'repeat' ) ); ?> tipi-tile tipi-xs-0">
	<?php zeen_modal_closer(); ?>
	<div class="bg-area">
		<div class="content clearfix">
			<?php zeen_logo( 'slide' ); ?>
				<?php dynamic_sidebar( 'slide-menu' ); ?>
		</div>
		<?php zeen_elem_bg_area( 'slide' ); ?>
	</div>
</div>
<?php endif; ?>
