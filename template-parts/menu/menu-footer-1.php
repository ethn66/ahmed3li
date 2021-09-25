<?php
/**
 * Footer Menu 1 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<nav id="footer-navigation" class="footer-navigation clearfix font-<?php echo (int) get_theme_mod( 'typo_footer_menu', 3 ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer',
			'container' => '',
			'menu_class'     => 'footer-menu horizontal-menu',
		) );
		?>
	</nav><!-- .footer-navigation -->
<?php endif; ?>
