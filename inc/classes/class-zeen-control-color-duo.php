<?php
/**
 * Control Duo Color
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Color_Duo extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-color-duo';

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
		<label>

			<span class="customize-control-title customize-control-title-top"><?php echo sanitize_text_field( $this->label ); ?><?php
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="' . sanitize_text_field( $this->description ) . '"></span>';
			}
			?></span>


			<span class="picker-wraps">
				<span class="picker-wrap picker-no-1">
					<?php if ( is_array( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo sanitize_text_field( $this->label[0] ); ?></span>
					<?php } ?>
					<input class="alpha-color-control" type="text" data-show-opacity="false" data-palette="true" data-default-color="<?php echo esc_attr( $this->settings[0]->default ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->settings[0]->id ); ?>" name="_customize-zeen-color-duo-<?php echo esc_attr( $this->id ); ?>[]"  />
				</span>
				<span class="picker-wrap picker-no-2">
					<?php if ( is_array( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo sanitize_text_field( $this->label[1] ); ?></span>
					<?php } ?>
					<input class="alpha-color-control" type="text" data-show-opacity="false" data-palette="true" data-default-color="<?php echo esc_attr( $this->settings[1]->default ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->settings[1]->id ); ?>" name="_customize-zeen-color-duo-<?php echo esc_attr( $this->id ); ?>[]"  />
				</span>
			</span>

		</label>
	<?php
	}

}
