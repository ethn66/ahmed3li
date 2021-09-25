<?php
/**
 * Zeen preview text
 *
 * @since 1.0.0
 */

class ZeenPreviewText extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		$this->type = 'classic';
		parent::__construct( $post, $i, $options );
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'preview-text preview-classic';
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		if ( ! empty( $this->options['settings']['image_ani'] ) ) {
			$this->options['classes'][] = 'img-ani-base img-ani-' . $this->options['settings']['image_ani'];
		}
		if ( ! empty( $this->options['settings']['image_color_ani'] ) ) {
			$this->options['classes'][] = 'img-color-base img-color-' . $this->options['settings']['image_color_ani'];
			if ( $this->options['settings']['image_color_ani'] > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}

		if ( ! empty( $this->options['settings']['image_color_ani_hover'] ) ) {
			$this->options['classes'][] = 'img-color-hover-base img-color-hover-' . $this->options['settings']['image_color_ani_hover'];
			if ( $this->options['settings']['image_color_ani_hover'] > 10 ) {
				$this->options['classes']['img-color-content'] = 'img-color-content';
			}
		}
	}

	/**
	 * Preview output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( empty( $echo ) ) {
			ob_start();
		}

		echo '<article class="' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '">';
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->byline( array(
			'location' => 2,
		) );
		$this->titles();
		$this->byline( array(
			'location' => 3,
		) );
		echo '</div>';
		if ( 68 == $this->options['preview'] ) {
			$this->mask();
		}
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->excerpt();
		$this->byline( array(
			'location' => 4,
		) );
		echo '</div>';
		echo '</article>';

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
