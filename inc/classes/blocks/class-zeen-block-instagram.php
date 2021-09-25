<?php
/**
 * Zeen block Instagram
 *
 * @since 1.0.0
 */

class ZeenBlockInstagram extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'instagram';
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
			$this->block_title();
		}
		zeen_instagram_block( array(
			'location' => 'tipibuilder',
			'custom_content' => $this->args['custom_content'],
		) );

		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
