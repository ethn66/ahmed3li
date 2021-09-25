<?php
/**
 * @package Zeen
 * @since 1.0.0
 */
?>
<form method="get" class="search tipi-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field font-b" placeholder="<?php echo esc_attr( get_theme_mod( 'search_placeholder', esc_attr__( 'Search', 'zeen' ) ) ); ?>" value="" name="s" autocomplete="off" aria-label="search form">
	<button class="tipi-i-search-thin search-submit" type="submit" value="" aria-label="search"></button>
</form>
