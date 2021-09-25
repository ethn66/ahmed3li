<?php
/**
 * Secondary Menu 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<nav id="secondary-navigation" class="secondary-navigation tipi-xs-0">
	<ul id="menu-secondary" class="menu-secondary horizontal-menu tipi-flex-eq-height menu-secondary ul-padding row font-<?php echo (int) get_theme_mod( 'typo_secondary_menu', 3 ); ?>">
		<?php
		if ( has_nav_menu( 'secondary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'secondary',
				'container' => '',
				'items_wrap' => '%3$s',
				'menu_class' => 'horizontal-menu ul-padding row',
			) );
		}
		?>
		<?php zeen_icons( array( 'location' => 'secondary_menu' ) ); ?>
		<?php zeen_current_date( 'secondary_menu' ); ?>
	</ul>
</nav><!-- .secondary-navigation -->
