<?php
/**
 * Zeen control multi checkbox class
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Multi_Checkbox extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-multi-checkbox';

	/**
     * Enqueue control related scripts
     *
     * @since 1.0.0
     */
    public function enqueue() {

		wp_enqueue_script( 'zeen-control-multi-checkbox', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-multi-checkbox.js' ), array( 'jquery' ), false, true );

    }

    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @since 1.0.0
     */
    public function to_json() {

		parent::to_json();
		$this->json['choices'] = $this->choices;
		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;

	}

	/**
     * Render content of the control
     *
     * @since 1.0.0
     */
	public function content_template() {
		?>
		<span class="zeen-control zeen-multi-checkbox zeen-cf">
			<# var valueArr = data.value.split(",") ;  if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<span class="zeen-multi-checkbox-wrap zeen-cf">
				<ul>
				<# for ( key in data.choices ) { #>
					<li>
						<label for="{{ data.id }}-{{ key }}">
							<input type="checkbox" id="{{ data.id }}-{{ key }}" class="zeen-val" value="{{ key }}" name="_customize-zeen-multi-checkbox-{{ data.id }}" <# if ( _.contains( valueArr, key ) ) { #>checked="checked"<# } #> >{{ data.choices[ key ] }}
						</label>
					</li>
				<# } #>
				</ul>
			</span>
		</span>
	<?php
	}
}
