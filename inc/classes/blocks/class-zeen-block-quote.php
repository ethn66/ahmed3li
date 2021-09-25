<?php
/**
 * Zeen block quote
 *
 * @since 1.0.0
 */

class ZeenBlockQuote extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'quote';
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
		echo '<blockquote>';
		$this->block_content();
		echo '</blockquote>';
		if ( empty( $this->args['only_inner'] ) ) {
			if ( ! empty( $this->args['small_print'] ) ) {
				echo '<div class="small-print clearfix">' . zeen_sanitize_titles( $this->args['small_print'] ) . '</div>';
			}
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}
}
