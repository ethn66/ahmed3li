<?php
/**
 * Zeen control radio image class
 *
 * @package    Zeen
 * @copyright  Copyright Codetipi
 * @since      1.0.0
 */
class Zeen_Control_Slider extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-slider';

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'zeen-control-slider', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-slider.js' ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-slider' ), false, true );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 */
	public function to_json() {

		parent::to_json();

		$this->json['choices']   = $this->choices;
		$this->json['value']     = $this->value();
		$this->json['id']        = $this->id;
		$this->json['detection'] = empty( $this->choices['detection'] ) ? 'change' : $this->choices['detection'];
		$this->json['suboption'] = empty( $this->choices['suboption'] ) ? '' : $this->choices['suboption'];

	}

	/**
	 * Render a JS template for the content of the control
	 *
	 * @since 1.0.0
	 */
	public function content_template() {
		?>
		<span class="zeen-control control-vertical-c zeen-slider-wrap zeen-cf">
			<# if ( data.label ) { #>
				<span class="customize-control-title">	<# if ( data.suboption ) { #><svg class="zeen__svg--arrow-r" width="10" height="10" xmlns="http://www.w3.org/2000/svg"><path d="M9.847 7.056L7.065 9.833a.505.505 0 01-.39.167.505.505 0 01-.388-.167.537.537 0 010-.777l1.835-1.834h-5.34A2.753 2.753 0 010 4.444V.556C0 .222.223 0 .556 0c.334 0 .557.222.557.556v3.888c0 .945.723 1.667 1.669 1.667h5.34L6.287 4.278a.537.537 0 010-.778.538.538 0 01.778 0l2.782 2.778c.056.055.111.11.111.166.056.112.056.278 0 .445 0 .055-.055.111-.111.167z" fill="#FFF" fill-rule="nonzero"/></svg> <# } #>{{ data.label }} <# if ( data.description ) { #>
				<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="{{{ data.description }}}"></span>
			<# } #></span>
			<# } #>
			<div class="slider-control-wrap">
				<div class="zeen-slider" data-detection=" {{ data.detection }}" data-min="{{ data.choices['min'] }}" data-max="{{ data.choices['max'] }}" data-step="{{ data.choices['step'] }}" data-default="{{ data.choices['default'] }}"></div>

				<span class="zeen-tip tip--wrap-{{ data.choices['type'] }}"><span class="zeen-val-show">{{ data.value }}</span><span class="slider-type"><# if ( data.choices['type'] ) { #>{{ data.choices['type'] }}<# } #></span></span>

				<span class="zeen-data"><span class="zeen-reset-wrap"><span class="dashicons dashicons-image-rotate zeen-reset" title="<?php esc_attr_e( 'Reset to default', 'zeen' ); ?>"></span></span><span class="zeen-val"><input name="_customize-zeen-slider-{{ data.id }}" class="zeen-val-input" value="{{ data.value }}" min="{{ data.choices['min'] }}" max="{{ data.choices['max'] }}" type="number"></span></span>
			</div>

		</span>

		<?php
	}
}
