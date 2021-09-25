<?php
/**
 * Zeen block sidebar
 *
 * @since 1.0.0
 */

class ZeenBlockSidebar extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'sidebar';
		parent::__construct( $args );
	}

	/**
	 * Block output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( $this->enabled() != true ) {
			return;
		}

		$sidebar = 2 == $this->args['sidebar'] ? 'builder-' . $this->args['uid'] : $this->args['sidebar'];
		$sticky = get_theme_mod( 'sticky_sidebar', 1 ) == 1 || 'on' == $this->args['sticky'] ? 'on' : 'off';
		$widgets_skin = zeen_skin_style( 'sidebar_widgets', 'skin', 4 );
		if ( is_active_sidebar( $sidebar ) ) :
			if ( empty( $echo ) ) {
				ob_start();
			}
			$classes = 'builder-sb';
			$responsive = $this->responsive_check();
			if ( empty( $responsive['mobile'] ) ) {
				$classes .= ' mob-off';
			}

			if ( empty( $responsive['desktop'] ) ) {
				$classes .= ' dt-off';
			}
			?>
			<div <?php zeen_classes( array( 'classes' => $classes, 'location' => 'sidebar', 'sticky' => $sticky, 'cols' => '' ) ); ?>>
				<aside class="block-wrap-no-<?php echo (int) $this->block_id(); ?> sidebar widget-area bg-area tipi-col site-img-<?php echo (int) zeen_skin_style( 'sidebar', 'repeat' ); ?> sb-skin-<?php echo (int) zeen_skin_style( 'sidebar' ); ?> widgets-title-skin-<?php echo (int) zeen_skin_style( 'sidebar_widgets_title', 'skin', 4 ); ?> widgets-skin-<?php echo (int) $widgets_skin; if ( 11 == $widgets_skin ) { echo ' widgets-skin-1'; } if ( get_theme_mod( 'sidebar_skin', 1 ) == 3 && ! zeen_is_light( get_theme_mod( 'sidebar_skin_color', '#272727' ) ) ) { echo ' sidebar-bg-dark'; } ?>">
					<div class="background"></div>
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside><!-- .sidebar .widget-area -->
			</div>
			<?php
			if ( empty( $echo ) ) {
				return ob_get_clean();
			}
		endif;

	}
}
