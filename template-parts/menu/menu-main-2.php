<?php
/**
 * Main Menu 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'main' ) ) : ?>
	<div id="menu-spacer-a"></div>
	<nav id="site-navigation" class="main-navigation main-navigation-border main-navigation-2 tipi-xs-0 stickyable clearfix">
		<div class="tipi-flex tipi-row tipi-relative sticky-part sticky-p1">
			<ul id="menu-main-menu" class="menu-main-menu horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?>">

				<?php do_action( 'zeen_before_main_menu' ); ?>
				<?php
					zeen_current_date( 'main_menu' );
					wp_nav_menu( array(
						'theme_location' => 'main',
						'container' => '',
						'items_wrap' => '%3$s',
						'walker' => new ZeenWalkerOutput(),
					) );
				?>
			</ul>
			<?php if ( true == zeen_icons( array( 'location' => 'main_menu', 'test' => true ) ) ) { ?>
				<ul class="horizontal-menu font-s menu-icons tipi-flex-right tipi-flex-eq-height">
					<?php zeen_icons(); ?>
				</ul>
			<?php } ?>

		</div>
		<?php do_action( 'zeen_end_main_nav' ); ?>
	</nav><!-- .main-navigation -->
	<div id="menu-spacer-b"></div>
<?php
endif;
