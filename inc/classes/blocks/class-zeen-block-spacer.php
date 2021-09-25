<?php
/**
 * Zeen block spacer
 *
 * @since 1.0.0
 */

class ZeenBlockSpacer extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'spacer';
		parent::__construct( $args );
	}

	/**
	 * Block output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( $this->enabled() != true ) {
			return;
		}
		if ( empty( $echo ) ) {
			ob_start();
		}
		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
