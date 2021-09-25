<?php
/**
 * Secondary Menu 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'secondary' ) || get_theme_mod( 'secondary_date' ) == 1 || get_theme_mod( 'secondary_menu_trending_inline' ) == 1 ) : ?>
	<nav id="secondary-navigation" class="secondary-navigation rotatable tipi-xs-0">
		<ul id="menu-secondary" class="menu-secondary horizontal-menu tipi-flex menu-secondary ul-padding row font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 );
			echo ' main-menu-skin-' . (int) get_theme_mod( 'main_menu_skin', 1 );
			if ( get_theme_mod( 'megamenu_color_usage_onoff', 1 ) == 1 ) {
				echo ' main-menu-bar-color-' . (int) get_theme_mod( 'megamenu_color_usage', 2 );
			}
			echo ' mm-skin-' . (int) get_theme_mod( 'megamenu_skin', 2 );
			echo ' mm-submenu-' . (int) get_theme_mod( 'megamenu_submenu_color', 1 );
			$mm_ani = get_theme_mod( 'megamenu_animation_onoff', 1 ) == 1 ? get_theme_mod( 'megamenu_animation', 1 ) : 0;
			echo ' mm-ani-' . (int) $mm_ani;
			?>">
			<?php
			zeen_current_date( 'secondary_menu' );
			zeen_trending_inline( 'secondary_menu' );

			if ( has_nav_menu( 'secondary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'secondary',
					'container' => '',
					'items_wrap' => '%3$s',
					'walker' => new ZeenWalkerOutput(),
				) );
			}
			?>
		</ul>
	</nav><!-- .secondary-navigation -->
<?php
endif;
