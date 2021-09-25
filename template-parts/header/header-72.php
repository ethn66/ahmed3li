<?php
/**
 * Header 72 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
	$icons = zeen_icons( array(
		'location' => 'main_menu',
		'test' => true,
	) );
?>
<div class="bg-area">
	<div class="logo-main-wrap clearfix header-side-padding">
		<nav class="main-navigation main-navigation-4 tipi-flex tipi-flex-eq-height tipi-xs-0<?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?>">
			<div class="logo-l-padding tipi-vertical-c header-padding">
				<?php zeen_logo(); ?>
			</div>
			<?php zeen_cta( 'header' ); ?>
			<?php if ( has_nav_menu( 'main' ) || ! empty( $icons ) ) : ?>
				<ul id="menu-main-menu" class="menu-main-menu horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> menu-icons tipi-flex-r">
					<?php
					if ( has_nav_menu( 'main' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => '',
							'items_wrap' => '%3$s',
							'walker' => new ZeenWalkerOutput(),
						) );
					}
					?>
					<?php zeen_trending_inline( 'main_menu' ); ?>
					<?php
					if ( ! empty( $icons ) ) {
						zeen_icons();
					}
					?>
				</ul>
			<?php endif; ?>
		</nav><!-- .main-navigation -->
	</div>
	<?php do_action( 'zeen_after_nav_grid' ); ?>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
