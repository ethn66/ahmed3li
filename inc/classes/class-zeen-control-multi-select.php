<?php
/**
 * Zeen control multi select class
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Multi_Select extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-multi-select';
	public $multi = 'on';
	public $order = '';
	public $selectionHeader = '';
	public $selectableHeader = '';

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {

		wp_enqueue_script( 'jquery-multi-select', get_parent_theme_file_uri( 'assets/admin/js/jquery.multi-select.js' ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'zeen-control-multi-select', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-multi-select.js' ), array( 'jquery', 'jquery-multi-select' ), false, true );
	}

	/**
	 * Render content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		$multi = 'off' == $this->multi ? false : true;
		$wrap_class = 'zeen-select-wrap';
		$label_class = 'control-vertical-c';
		if ( ! empty( $multi ) ) {
			$wrap_class .= ' zeen-select-wrap-multi';
		}
		$new_value = $this->value();
		$class = '';
		$selection_header = empty( $this->selectionHeader ) ? '' : $this->selectionHeader ;
		$selectable_header = empty( $this->selectableHeader ) ? '' : $this->selectableHeader ;
		if ( ! empty( $this->order ) ) {
			$label_class .= ' select__with-order__wrap';
			$class = 'select__with-order';
		}
	?>
	<label class="<?php echo esc_attr( $label_class ); ?>">
		<?php
		if ( ! empty( $this->label )  ) {
			echo '<span class="customize-control-title">' . ( $this->label );
			if ( ! empty( $this->description ) ) {
				echo '<span class="tipi-tip description customize-control-description dashicons dashicons-editor-help" data-title="' . esc_attr( $this->description ) . '"></span>';
			}
			echo '</span>';
		}
		?>
		<div class="<?php echo esc_attr( $wrap_class ); ?>">
			<select<?php if ( ! empty( $multi ) ) { ?> multiple="multiple" <?php } ?> <?php $this->link(); ?> name="_customize-zeen-multi-select-<?php echo esc_attr( $this->id ); ?>" class="<?php echo esc_attr( $class ); ?>" data-selectableHeader="<?php echo esc_attr( $selectable_header ); ?>" data-selectionHeader="<?php echo esc_attr( $selection_header ); ?>">
				<?php
				foreach ( $this->choices as $key => $value ) {
					echo '<option value="' . esc_attr( $key ) . '"';
					if ( ! empty( $multi ) ) {
						if ( is_array( $new_value ) && in_array( $key, $new_value ) ) {
							echo 'selected="selected"';
						}
					} else {
						if ( $new_value == $key ) {
							echo 'selected="selected"';
						}
					}
					echo '>' . sanitize_text_field( $value ) . '</option>';
				}
				?>
			</select>
		</div>
	</label>
	<?php
	}
}
