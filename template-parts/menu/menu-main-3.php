<?php
/**
 * Main Menu 3 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'main' ) ) : ?>
	<nav id="site-navigation" class="main-navigation main-navigation-border main-navigation-3 tipi-xs-0 stickyable clearfix">
		<div class="tipi-row tipi-flex-lcr tipi-relative sticky-part sticky-p1">
			<span class="tipi-flex-l"></span>
			<ul id="menu-main-menu" class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> tipi-flex-c tipi-flex-2">

				<?php do_action( 'zeen_before_main_menu' ); ?>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main',
						'container' => '',
						'items_wrap' => '%3$s',
						'walker' => new ZeenWalkerOutput(),
					) );
				?>
			</ul>
			<ul class="horizontal-menu font-s menu-icons tipi-vertical-c tipi-flex-r">
				<?php zeen_icons(); ?>
			</ul>
		</div>
		<?php do_action( 'zeen_end_main_nav' ); ?>
	</nav><!-- .main-navigation -->
<?php
endif;
