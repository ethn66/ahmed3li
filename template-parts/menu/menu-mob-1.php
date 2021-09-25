<?php
/**
 * Mobile Menu 1
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<?php
$search = get_theme_mod( 'mobile_icon_search' );
$cta = get_theme_mod( 'mobile_menu_cta' );
$cta_2 = get_theme_mod( 'mobile_menu_secondary_cta' );

if ( has_nav_menu( 'mobile' ) || ! empty( $search ) || ! empty( $cta ) || ! empty( $cta_2 ) ) :
	echo '<nav class="mobile-navigation mobile-navigation-1">';
	if ( ! empty( $search ) ) {
		echo '<div class="mobile-search-wrap font-' . (int) get_theme_mod( 'typo_mobile_menu', 2 ) . '">';
		get_search_form( array(
			'aria_label' => 'mobile-slide-in',
		) );
		echo '</div>';
	}
	if ( has_nav_menu( 'mobile' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'mobile',
			'container' => '',
			'menu_class'     => 'menu-mobile vertical-menu font-' . (int) get_theme_mod( 'typo_mobile_menu', 2 ),
			'menu_id'     => 'menu-mobile',
		) );
	}
	if ( ! empty( $cta ) ) {
		echo '<div class="mobile-cta-wrap tipi-vertical-c ';
		echo empty( $cta_2 ) ? ' mobile-cta-wrap-1' : 'mobile-cta-wrap-2';
		echo '">';
		zeen_cta( 'mobile_menu' );
		if ( ! empty( $cta_2 ) ) {
			zeen_cta( 'mobile_menu_secondary' );
		}
		echo '</div>';
	}
	echo '</nav>';
endif;
