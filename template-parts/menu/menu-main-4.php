<?php
/**
 * Main Menu 4 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'main' ) ) : ?>
	<nav id="site-navigation" class="main-navigation main-navigation-border main-navigation-4 tipi-xs-0 tipi-flex-right">
		<div class="tipi-row tipi-relative">
			<ul id="menu-main-menu" class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>">
				<?php do_action( 'zeen_before_main_menu' ); ?>
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
	</nav><!-- .main-navigation -->
<?php
endif;
