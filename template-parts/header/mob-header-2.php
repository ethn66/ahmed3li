<?php
/**
 * Mobile Header 2 output
 *
 * @package Zeen
 * @since 1.0.0
 */
?>
<div class="bg-area stickyable header-padding tipi-row tipi-vertical-c">
	<div class="logo-main-wrap logo-mob-wrap tipi-vertical-c">
		<?php zeen_logo( 'mobile' ); ?>
	</div>
	<ul class="menu-right icons-wrap tipi-vertical-c">
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'dark_mode' ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'cart' ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_menu', 'type' => 'search', 'search_on' => get_theme_mod( 'mobile_header_icon_search', 1 ) ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'login' ) ); ?>
		<?php zeen_icons( array( 'location' => 'mobile_header', 'type' => 'mobile_slide' ) ); ?>
	</ul>
	<?php zeen_elem_bg_area( 'mobile_header' ); ?>
</div>
