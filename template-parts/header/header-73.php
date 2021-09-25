<?php
/**
 * Header 73 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area">
	<div class="logo-main-wrap clearfix tipi-row header-side-padding">
		<nav id="site-navigation" class="main-navigation main-navigation-4 tipi-flex tipi-flex-eq-height tipi-xs-0">
			<div class="logo-l-padding tipi-vertical-c header-padding">
				<?php zeen_logo(); ?>
			</div>
			<?php if ( has_nav_menu( 'main' ) ) : ?>
				<ul id="menu-main-menu" class="menu-main-menu horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => '',
							'items_wrap' => '%3$s',
							'walker' => new ZeenWalkerOutput(),
						) );
					?>
				</ul>
			<?php endif; ?>
			<?php zeen_cta( 'header' ); ?>
			<ul class="menu-main-menu horizontal-menu tipi-flex-eq-height font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> menu-icons tipi-flex-r">
				<?php zeen_trending_inline( 'main_menu' ); ?>
				<?php zeen_icons(); ?>
			</ul>
		</nav><!-- .main-navigation -->
	</div>
	<?php do_action( 'zeen_after_nav_grid' ); ?>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
