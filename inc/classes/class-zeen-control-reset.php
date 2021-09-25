<?php
/**
 * Zeen control reset
 *
 * @package Zeen
 * @since 2.0.3
 */
class Zeen_Control_Reset extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-reset';

	/**
	 * Render content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		echo '<div class="customize-control-with-button">';
		echo '<label>';
		echo '<span class="zeen-control-reset actions"><button type="button" class="button" id="zeen-reset">' . sanitize_text_field( $this->label ) . '</button></span>';
		echo '</label>';
		echo '</div>';
	}

}
