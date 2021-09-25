<?php
/**
 * Block: Collapsible
 *
 * @package Zeen
 * @since 4.0.0
 */

class ZeenBlockCollapsible extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'collapsible';
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
		}

		echo '<div class="collapsible__wrap">';
		echo '<div class="collapsible__title tipi-vertical-c">';
		echo zeen_sanitize_wp_kses( $this->args['title'] );
		echo '<i class="tipi-i-chevron-down"></i>';
		echo '</div>';
		echo '<div class="collapsible__content">';
		$this->block_content();
		echo '</div>';
		echo '</div>';

		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
