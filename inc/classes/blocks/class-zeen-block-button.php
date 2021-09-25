<?php
/**
 * Zeen block Button
 *
 * @since 1.0.0
 */

class ZeenBlockButton extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'button';
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

		$button_style = $this->args['button_style_1'];
		$button_text = $this->args['button_text'];
		$button_alignment = $this->args['button_alignment'];
		$button_size = empty( $this->args['button_size'] ) ? '' : $this->args['button_size'];
		$button_design = empty( $this->args['button_design'] ) ? '' : $this->args['button_design'];
		echo '<span class="tipi-button-wrap clearfix';
		if ( ! empty( $button_size ) ) {
			echo ' button-size-wrap-' . (int) $button_size;
		}
		if ( ! empty( $button_design ) ) {
			echo ' button-design-wrap-' . (int) $button_design;
		}
		if ( ! empty( $button_alignment ) ) {
			echo ' tipi-button-align-' . (int) $button_alignment;
		}
		echo '">';
		$button = zeen_button_link_check( array(
			'data' => $button_text,
			'wrap_off' => true,
			'button_style' => $button_style,
		) );
		echo zeen_sanitize_titles( $button );
		echo '</span>';

		if ( empty( $this->args['only_inner'] ) ) {
			$this->closing_wrap();
		}
		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
