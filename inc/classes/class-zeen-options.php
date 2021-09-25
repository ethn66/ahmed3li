<?php
/**
 * Zeen options
 *
 * @package     Zeen
 * @copyright   Copyright Codetipi
 * @since       1.0.0
 */
class ZeenOptions {

	/**
	 * Options
	 *
	 * @since    1.0.0
	 */
	static $zeen_options;

	/**
	 * Options getter
	 *
	 * @since    1.0.0
	 */
	static function zeen_get_option( $option = 'zeen_engine_options' ) {

		self::$zeen_options = get_option( $option, array() );

	}

	/**
	 * Options setter
	 *
	 * @since    1.0.0
	 */
	static function zeen_update_option( $option = 'zeen_engine_options' ) {

		$options = self::zeen_sanitized();
		update_option( $option, $options );
		self::$zeen_options = get_option( 'zeen_engine_options' );

	}

	/**
	 * Options sanitizer
	 *
	 * @since    1.0.0
	 */
	private static function zeen_sanitized( $option = '' ) {

		$option = empty( $option ) ? self::$zeen_options : $option;
		$sanitized_array = array();
		if ( ! is_array( $option ) ) {
			return array();
		}

		foreach ( $option as $key => $value ) {

			if ( ! is_array( $value ) && ! is_object( $value ) ) {
				$sanitized_array[ esc_html( $key ) ] = esc_attr( $value );
			}

			if ( is_array( $value ) ) {
				$sanitized_array[ esc_html( $key ) ] = self::zeen_sanitized( $value );
			}
		}

		return $sanitized_array;
	}

	/**
	 * Spon Posts
	 *
	 * @since    1.0.0
	 */
	static function zeen_get_spon() {

		$output = empty( self::$zeen_options['zeen_spon'] ) ? '' : self::$zeen_options['zeen_spon'];

		return $output;

	}

	/**
	 * Sidebar Post IDs
	 *
	 * @since    1.0.0
	 */
	static function zeen_get_sidebar_pids() {

		$output = empty( self::$zeen_options['zeen_sidebar_pids'] ) ? '' : self::$zeen_options['zeen_sidebar_pids'];

		return $output;

	}

	/**
	 * Builder IDs
	 *
	 * @since    1.0.0
	 */
	static function zeen_get_sidebar_bids() {

		$output = empty( self::$zeen_options['zeen_sidebar_bids'] ) ? '' : self::$zeen_options['zeen_sidebar_bids'];

		return $output;

	}

	/**
	 * Sidebar Term IDs
	 *
	 * @since    1.0.0
	 */
	static function zeen_get_sidebar_tids() {

		$output = empty( self::$zeen_options['zeen_sidebar_tids'] ) ? '' : self::$zeen_options['zeen_sidebar_tids'];

		return $output;

	}
	/**
	 * Sidebar Custom IDs
	 *
	 * @since    4.0.0
	 */
	static function zeen_get_sidebar_cids() {

		$output = empty( self::$zeen_options['zeen_sidebar_cids'] ) ? '' : self::$zeen_options['zeen_sidebar_cids'];

		return $output;

	}

}

ZeenOptions::zeen_get_option();
