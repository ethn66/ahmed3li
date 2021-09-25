<?php
/**
 * Zeen control subtitle
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Subtitle extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-subtitle';

	/**
	 * Render content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		echo '<label>';

			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<span class="zeen-control-subtitle">' . sanitize_text_field( $this->label ) . '</span>';
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description zeen-control-description">' . sanitize_text_field( $this->description ) . '</span>';
			}

		echo '</label>';
	}

}
