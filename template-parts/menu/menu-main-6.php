<?php
/**
 * Main Menu 6 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'main' ) ) : ?>
	<nav id="site-navigation" class="main-navigation main-navigation-2 tipi-xs-0">
		<div class="tipi-flex tipi-row tipi-relative">
			<ul id="menu-main-menu" class="horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_main_menu', 3 ); ?> tipi-vertical-c">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main',
						'container' => '',
						'items_wrap' => '%3$s',
						'walker' => new ZeenWalkerOutput(),
					) );
				?>
			</ul>
			<?php if ( true == zeen_icons( array( 'location' => 'main_menu', 'test' => true ) ) ) { ?>
				<ul class="horizontal-menu font-s menu-icons tipi-flex-right tipi-vertical-c">
					<?php zeen_icons(); ?>
				</ul>
			<?php } ?>
		</div>
	</nav><!-- .main-navigation -->
<?php endif; ?>
