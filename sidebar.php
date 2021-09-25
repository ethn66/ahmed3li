<?php
/**
 * Sidebar
 *
 * @package Zeen
 * @since 1.0.0
 */
?>

<?php
$sidebar = empty( $args['sb'] ) ? zeen_get_sidebar_slug() : $args['sb'];
$widgets_skin = zeen_skin_style( 'sidebar_widgets', 'skin', 4 );
$sticky = 1 == get_theme_mod( 'sticky_sidebar', 1 ) ? 'on' : 'off';
$mob = zeen_unsidebar_mob();
if ( ! empty( $mob ) ) {
	return;
}
if ( is_active_sidebar( $sidebar ) ) {
?>
<div <?php zeen_classes( array( 'location' => 'sidebar', 'native' => true, 'sticky' => $sticky ) ); ?>>
	<?php do_action( 'zeen_sidebar_before' ); ?>
	<aside class="sidebar widget-area bg-area site-img-<?php echo (int) zeen_skin_style( 'sidebar', 'repeat' ); ?> sb-skin-<?php echo (int) zeen_skin_style( 'sidebar' ); ?> widgets-title-skin-<?php echo (int) zeen_skin_style( 'sidebar_widgets_title', 'skin', 4 ); ?> widgets-skin-<?php echo (int) $widgets_skin; if ( 11 == $widgets_skin ) { echo ' widgets-skin-1'; } if ( get_theme_mod( 'sidebar_skin', 1 ) == 3 && ! zeen_is_light( get_theme_mod( 'sidebar_skin_color', '#272727' ) ) ) { echo ' sidebar-bg-dark'; }?>">
		<div class="background"></div>
		<?php dynamic_sidebar( $sidebar ); ?>
	</aside><!-- .sidebar -->
</div>
<?php
}
