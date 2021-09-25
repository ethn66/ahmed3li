<?php
/**
 * Zeen Actions
 *
 * @copyright   Copyright Codetipi
 * @since 1.0.0
*/
namespace TipiBuilder;

class ZeenActions {

	/**
	 * Rows
	 *
	 * @since 1.0.0
	*/
	function zeen_template() {
		require ZEEN_BUILDER_DIR . '/app/frontend/frontend.php';
	}

	/**
	 * cache
	 *
	 * @since 1.0.0
	 */
	public function zeen_cache() {
		if ( ZeenHelpers::zeen_builder_call() == true ) {
			header( 'Cache-Control: no-cache, no-store, must-revalidate' );
			header( 'Pragma: no-cache' );
			header( 'Expires: 0' );
			define( 'DONOTCACHEDB', true );
			define( 'DONOTCACHEPAGE', true );
			define( 'DONOTCACHCEOBJECT', true );
		}
	}
}
