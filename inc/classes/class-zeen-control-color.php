<?php
/**
 * Control Alpha Color picker
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Color extends WP_Customize_Control {


	/**
	 * Type.
	 *
	 * @access public
	 * @since 1.0.0
	 * @var string
	 */
	public $type = 'codetipi-color';

	/**
	 * Enqueue scripts/styles for the color picker.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script(
			'zeen-controls',
			get_parent_theme_file_uri( '/assets/admin/js/controls.js' ),
			array(
				'customize-controls',
				'jquery',
				'customize-base',
				'react',
				'react-dom',
				'wp-element',
				'wp-components',
			),
			ZEEN_VERSION,
			true
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['choices'] = $this->choices;
	}

	/**
	 * Empty JS template.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function content_template() {}
}

