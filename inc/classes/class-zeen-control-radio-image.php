<?php
/**
 * Zeen control radio image class
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Radio_Image extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-radio-image';

	public $cols = 4;

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {

		wp_enqueue_script( 'zeen-control-radio-image', get_parent_theme_file_uri( '/assets/admin/js/zeen-control-radio-image.js' ), array( 'jquery' ), false, true );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0.0
	 */
	public function to_json() {

		parent::to_json();

		// Sanitize urls
		foreach ( $this->choices as $key => $value ) {
			$this->choices[ $key ]['url'] = esc_url( $value[ 'url' ] );
			$this->choices[ $key ]['url'] = rtrim( $this->choices[ $key ]['url'], '/');
			$ext = substr( $this->choices[ $key ]['url'], -3 );

			if ( $ext == 'png' ) {
				$retina = substr_replace( $value[ 'url' ], '@2x', -4, 0);
				$this->choices[ $key ]['retina'] = esc_url( $retina );
			}
		}

		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;
		$this->json['cols']    = $this->cols;

	}

	/**
	 * Render a JS template for the content of the control
	 *
	 * @since 1.0.0
	 */
	public function content_template() {
		?>
		<span class="zeen-control zeen-radio-image-wrap zeen-cf">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}<# if ( data.description ) { #>
				<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="{{{ data.description }}}"></span>
			<# } #></span>
			<# } #>

			<span class="zeen-radio-images zeen-columns-{{ data.cols }}">
				<# for ( key in data.choices ) { #>
					<span class="zeen-radio-image zeen-radio-image-{{ key }}">
						<input type="radio" id="{{ data.id }}-{{ key }}" value="{{ key }}" <# if ( (data.value) == (key) ) { #>checked="checked"<# } #> name="_customize-zeen-radio-image-{{ data.id }}" {{{ data.link }}}>
						<label for="{{ data.id }}-{{ key }}">
							<img src="{{ data.choices[ key ][ 'url' ] }}" <# if ( data.choices[ key ][ 'retina' ] ) { #>srcset="{{ data.choices[ key ][ 'retina' ] }} 2x"<# } #> >
						</label>
					</span>
				<# } #>
			</span>
		</span>
	<?php
	}
}

