<?php
/**
 * Zeen i18n
 *
 * @copyright  Copyright Codetipi
 * @since      1.0.0
*/
namespace Zeen;

class ZeenI18n {

	/**
	 * Admin i18n
	 *
	 * @since 1.0.0
	 */
	public static function zeen_admin_i18n() {

		$output = array();

		$output['close']             = esc_html__( 'Close', 'zeen' );
		$output['now']               = esc_html__( 'Now', 'zeen' );
		$output['titleWarning']      = esc_html__( 'Warning', 'zeen' );
		$output['titleCancel']       = esc_html__( 'Cancel', 'zeen' );
		$output['titleContinue']     = esc_html__( 'Continue', 'zeen' );
		$output['tipiModalContent']  = esc_html__( 'Existing content was found on the page. If you use the Tipi Builder that content will be replaced.', 'zeen' );
		$output['titleModal']        = esc_html__( 'Select Image', 'zeen' );
		$output['titleGalleryModal'] = esc_html__( 'Select or Upload Images', 'zeen' );
		$output['validateMsg']       = esc_html__( 'Are you sure you want to remove your validated license from this domain?', 'zeen' );
		$output['textActive']        = esc_attr__( 'Active', 'zeen' );
		$output['textInactive']      = esc_attr__( 'Inactive', 'zeen' );
		$output['textStatus']        = esc_attr__( 'Status', 'zeen' );

		return $output;
	}

	/**
	 * i18n
	 *
	 * @since 1.0.0
	 */
	public static function zeen_i18n() {

		$output               = array();
		$output['embedError'] = esc_html__( 'There was a problem with your embed code. Please refer to the documentation for help.', 'zeen' );
		$output['loadMore']   = esc_html__( 'Load More', 'zeen' );
		$output['outOfStock'] = esc_html__( 'Out Of Stock', 'zeen' );
		$output['noMore']     = esc_html__( 'No More Content', 'zeen' );
		$output['share']      = esc_html__( 'Share', 'zeen' );
		$output['pin']        = esc_html__( 'Pin', 'zeen' );
		$output['tweet']      = esc_html__( 'Tweet', 'zeen' );
		return $output;
	}

}
