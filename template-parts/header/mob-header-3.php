<?php
/**
 * Mobile Header 3 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area stickyable header-padding tipi-row tipi-vertical-c">
	<ul class="menu-left icons-wrap tipi-vertical-c">
		<?php echo apply_filters( 'zeen_mobile_header_left_side', '' ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'search', 'search_on' => get_theme_mod( 'mobile_header_icon_search', 1 ) ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'cart' ) ); ?>
	</ul>
	<ul class="menu-right icons-wrap tipi-vertical-c">
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'dark_mode' ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'login' ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'mobile_slide' ) ); ?>
	</ul>
	<?php zeen_elem_bg_area( 'mobile_header' ); ?>
</div>
