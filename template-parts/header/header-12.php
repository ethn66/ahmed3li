<?php
/**
 * Header 12 output
 *
 * @package Zeen
 * @since 3..0
 */
?>
<div class="bg-area">
	<div class="logo-main-wrap clearfix <?php if ( zeen_check_width( get_theme_mod( 'header_width', 1 ) ) == 1 ) { ?> tipi-row<?php } ?> header-side-padding">
		<nav id="site-navigation" class="main-navigation main-navigation-4 tipi-flex tipi-flex-eq-height tipi-xs-0">
			<ul id="menu-main-menu" class="menu-main-menu horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> menu-icons tipi-flex-l">
			<?php if ( has_nav_menu( 'main' ) ) : ?>
				<?php zeen_icons( array( 'location' => 'main_menu', 'type' => 'social' ) ); ?>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main',
						'container' => '',
						'items_wrap' => '%3$s',
						'walker' => new ZeenWalkerOutput(),
					) );
				?>
			<?php endif; ?>
			</ul>
			<div class="logo-main-wrap header-padding tipi-all-c">
				<?php zeen_logo(); ?>
			</div>
			<?php zeen_cta( 'header' ); ?>
			<ul class="menu-main-menu horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> menu-icons tipi-flex-r">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main_b',
						'container' => '',
						'items_wrap' => '%3$s',
						'walker' => new ZeenWalkerOutput(),
					) );
				?>
				<?php zeen_icons( array( 'location' => 'main_menu', 'type' => 'util' ) ); ?>
				<?php zeen_icons( array( 'location' => 'main_menu', 'type' => 'cart' ) ); ?>
				<?php zeen_trending_inline( 'main_menu' ); ?>
			</ul>
		</nav><!-- .main-navigation -->
	</div>
	<?php do_action( 'zeen_after_nav_grid' ); ?>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
