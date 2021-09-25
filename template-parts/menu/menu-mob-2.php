<?php
/**
 * Mobile Menu 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>

<?php if ( has_nav_menu( 'mobile' ) ) : ?>
	<nav class="mobile-navigation mobile-navigation-dd mobile-navigation-2">
		<ul class="menu-mobile menu-mobile-2 horizontal-menu font-<?php echo (int) get_theme_mod( 'typo_mobile_menu', 2 ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'mobile',
					'container' => '',
					'items_wrap' => '%3$s',
				) );
			?>
			<?php zeen_icons( array( 'location' => 'mobile_menu', 'type' => 'mobile_slider' ) ); ?>
		</ul>
	</nav><!-- .main-navigation -->
<?php
endif;
