<?php
/**
 * Control Border
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Border extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-border';

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {

		wp_enqueue_script( 'zeen-control-color-a', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-color-a.js' ), array( 'jquery', 'wp-color-picker' ), false, true );
	}

	/**
	 * Render the content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
	?>
		<div class="zeen-border-wrap">
			<span class="customize-control-title customize-control-title-top"><?php echo sanitize_text_field( $this->label ); ?><?php
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="' . sanitize_text_field( $this->description ) . '"></span>';
			}
			?></span>
			<div class="zeen-border-control">
				<span class="mini-tool input-wrap">
					<input type="number" min="0" max="30" step="1" data-customize-setting-link="<?php echo esc_attr( $this->settings[0]->id ); ?>" class="zeen-border" name="_customize-zeen-border-<?php echo esc_attr( $this->id ); ?>[]" title="<?php esc_attr_e( 'Border Width (Pixels)', 'zeen' ); ?>" />
				</span>
				<div class="zeen-select-wrap">
					<select data-customize-setting-link="<?php echo esc_attr( $this->settings[1]->id ); ?>" class="zeen-border-style" data-default-weight="<?php echo esc_attr( $this->settings[1]->value() ); ?>" name="_customize-zeen-border-<?php echo esc_attr( $this->id ); ?>[]" title="<?php esc_attr_e( 'Border Style', 'zeen' ); ?>">
						<option value="solid" <?php selected( 'solid', $this->settings[1]->value() ); ?>><?php esc_attr_e( 'Solid', 'zeen' ); ?></option>
						<option value="dotted" <?php selected( 'dotted', $this->settings[1]->value() ); ?>><?php esc_attr_e( 'Dotted', 'zeen' ); ?></option>
						<option value="dashed" <?php selected( 'dashed', $this->settings[1]->value() ); ?>><?php esc_attr_e( 'Dashed', 'zeen' ); ?></option>
					</select>
				</div>
				<span class="mini-tool alpha-wrap">
					<input class="alpha-color-control" type="text" data-show-opacity="off" data-palette="false" data-default-color="<?php echo esc_attr( $this->settings[2]->default ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->settings[2]->id ); ?>" name="_customize-zeen-border-<?php echo esc_attr( $this->id ); ?>[]"  />
				</span>
			</div>
		</div>
	<?php
	}

}