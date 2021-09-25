<?php
/**
 * Deprecated
 *
 * @package Zeen
 * @since 4.0.0
 */


if ( ! function_exists( 'zeen_is_mobile_site' ) ) {
	function zeen_is_mobile_site() {
		_doing_it_wrong( 'zeen_is_mobile_site', 'Deprecated in favor of ZeenMobile::is_mobile()', 4.1.0 );
	}
}