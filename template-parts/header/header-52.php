<?php
/**
 * Header 52 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area">
	<div class="logo-main-wrap clearfix tipi-row header-padding">
		<nav id="site-navigation" class="main-navigation main-navigation-4 tipi-flex tipi-vertical-c tipi-xs-0">
			<?php zeen_logo(); ?>
			<?php if ( has_nav_menu( 'main' ) ) : ?>
				<div class="tipi-row tipi-flex-right">
					<ul id="menu-main-menu" class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main',
								'container' => '',
								'items_wrap' => '%3$s',
								'walker' => new ZeenWalkerOutput(),
							) );
						?>
						<?php zeen_icons(); ?>
					</ul>
				</div>
			<?php endif; ?>
		</nav><!-- .main-navigation -->
	</div>
	<?php do_action( 'zeen_after_nav_grid' ); ?>
	<?php zeen_elem_bg_area( 'header' ); ?>
</div>
