<?php
/**
 * Zeen mobile
 *
 * @copyright   Copyright Codetipi
 * @since 1.0.0
 */
class ZeenMobile {

	public static $detect = '';

	public function __construct() {
		if ( get_theme_mod( 'separate_mobile_bucket' ) == 1 && class_exists( 'Mobile_Detect' ) ) {
			self::$detect = empty( self::$detect ) ? new ZeenMobileDetect() : self::$detect;
		}
	}

	public static function is_mobile() {
		if ( ! empty( self::$detect ) && self::$detect->isMob() ) {
			return true;
		}
	}

	public static function is_tablet() {
		if ( ! empty( self::$detect ) && self::$detect->isTab() ) {
			return true;
		}
	}

	public static function is_mobile_or_tablet() {
		if ( ! empty( self::$detect ) && self::$detect->isMobTab() ) {
			return true;
		}
	}
	public static function mobile_thumbnails() {
		if ( get_theme_mod( 'separate_mobile_bucket' ) == 1 && apply_filters( 'zeen_additional_mobile_thumbnails', true ) ) {
			return true;
		}
	}

	public static function amp_is_request() {
		if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
			return true;
		}
	}
	public static function is_mobile_or_amp() {
		if ( function_exists( 'amp_is_request' ) && amp_is_request() && self::$detect->isMob() ) {
			return true;
		}
	}

}
new ZeenMobile();
