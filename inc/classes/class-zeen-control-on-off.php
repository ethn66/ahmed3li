<?php
/**
 * Control on off class
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_On_Off extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-on-off';

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {

		wp_enqueue_script( 'zeen-control-on-off', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-on-off.js' ), array( 'jquery' ), false, true );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 */
	public function to_json() {

		parent::to_json();

		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;

	}

	/**
	 * Render a JS template for the content of the control
	 *
	 * @since 1.0.0
	 */
	public function content_template() {
		?>
		<span class="zeen-control zeen-on-off-wrap clearfix">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}<# if ( data.description ) { #>
				<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="{{{ data.description }}}"></span>
			<# } #></span>
			<# } #>

			<span class="zeen-on-off">
				<input type="checkbox" id="{{ data.id }}" data-customize-setting-link="{{ data.id }}" value="{{ data.value }}" <# if ( data.value === 1 ) { #>checked="checked"<# } #> name="_customize-zeen-on-off-{{ data.id }}">
				<label for="{{ data.id }}">
					<span class="zeen-on-off-ux"></span>
				</label>
			</span>
		</span>

	<?php
	}
}
