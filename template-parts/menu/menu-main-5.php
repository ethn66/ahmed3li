<?php
/**
 * Main Menu 5 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'main' ) ) : ?>
	<nav id="site-navigation" class="main-navigation main-navigation-5 tipi-xs-0">
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
	</nav><!-- .main-navigation -->
<?php
endif;
