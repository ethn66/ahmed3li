<?php
/**
 * Preview thumbnail
 *
 * @since 1.0.0
 */

class ZeenPreviewThumbnail extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		$this->type = 'thumbnail';
		parent::__construct( $post, $i, $options );
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'preview-thumbnail';
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		if ( 25 == $this->options['preview'] ) {
			$this->options['byline_off'] = true;
			$this->options['review_off'] = true;
		}
		$this->options['classes'][] = 'elements-design-' . intval( get_theme_mod( 'classic_meta_design', 1 ) );
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

		echo '<article class="' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '" style="--animation-order:' . (int) $this->i;
		if ( ! empty( $this->options['var'] ) ) {
			echo ';' . esc_attr( $this->options['var'] );
		}
		echo '">';
		echo '<div class="preview-mini-wrap clearfix">';
		$this->mask();
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->byline( array(
			'location' => 2,
		) );
		$this->titles( array(
			'post_subtitle' => 'off',
		) );
		$this->byline( array(
			'location' => 3,
		) );
		$this->byline( array(
			'location' => 4,
		) );
		echo '</div>';
		echo '</div>';
		echo '</article>';

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
