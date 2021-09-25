<?php
/**
 * Zeen control title
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Title extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-title';

	/**
	 * Render content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		$extra_class = isset( $this->choices ) && $this->choices == 'top' ? ' zeen-control-title-top' : '';
		echo '<label>';

			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<span class="zeen-control-title' . esc_attr( $extra_class ) . '">' . sanitize_text_field( $this->label ) . '</span>';
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description zeen-control-description">' . sanitize_text_field( $this->description ) . '</span>';
			}

		echo '</label>';
	}

}
