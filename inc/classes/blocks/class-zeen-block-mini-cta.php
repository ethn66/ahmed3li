<?php
/**
 * Zeen block Mini CTA
 *
 * @since 2.5.0
 */

class ZeenBlockMiniCTA extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'mini-cta';
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

		$button = '';
		if ( ! empty( $this->args['button_check'] ) && 'on' == $this->args['button_check'] ) {
			$button = $this->args['button_text'];
		}

		if ( empty( $echo ) ) {
			ob_start();
		}

		if ( empty( $this->args['only_inner'] ) ) {
			$this->opening_wrap();
			if ( empty( $this->args['only_block'] ) ) {
				$title = $this->args['title'];
				$subtitle = empty( $this->args['subtitle'] ) ? '' : $this->args['subtitle'];
				echo '<div class="title__wrap">';
				echo '<div class="mini-cta-title">' . zeen_sanitize_titles( $title ) . '</div>';
				echo '<div class="mini-cta-subtitle">' . zeen_sanitize_titles( $subtitle ) . '</div>';
				echo '</div>';
				$button_size = empty( $this->args['button_size'] ) ? '' : $this->args['button_size'];
				$button_design = empty( $this->args['button_design'] ) ? '' : $this->args['button_design'];
				echo '<div class="buttons__wrap';
				if ( ! empty( $button_size ) ) {
					echo ' button-size-wrap-' . (int) $button_size;
				}
				if ( ! empty( $button_design ) ) {
					echo ' button-design-wrap-' . (int) $button_design;
				}
				echo '">';
				if ( ! empty( $button ) ) {
					$button = zeen_button_link_check( array(
						'data' => $button,
						'x' => 1,
						'count' => 1,
						'button_style' => empty( $this->args[ 'button_style_1' ] ) ? '' : $this->args[ 'button_style_1' ],
					) );
					echo zeen_sanitize_titles( $button );
				}
				echo '</div>';
			}
			$this->closing_wrap();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
