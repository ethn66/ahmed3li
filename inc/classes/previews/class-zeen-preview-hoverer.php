<?php
/**
 * Preview hoverer
 *
 * @since 1.0.0
 */

class ZeenPreviewHoverer extends ZeenPreviews {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $post = '', $i = 1, $options = array() ) {
		$this->type = 'hoverer';
		parent::__construct( $post, $i, $options );
		$this->options['classes'][] = 'loop-' . $this->i;
		$this->options['classes'][] = 'preview-hoverer';
		$this->options['classes'][] = 'tipi-flex';
		$this->options['classes'][] = 'preview-' . $this->options['preview'];
		$this->options['classes'][] = 'elements-design-' . get_theme_mod( 'grid_meta_design', 1 );
	}

	private function hoverer_meta() {
		if ( 1 == $this->i ) {
			$this->options['classes'][] = ' selected';
		}

		echo '<article class="' . esc_attr( zeen_get_post_class( $this->options['classes'], $this->pid ) ) . '" data-i="' . (int) $this->i . '">';
		echo '<div class="' . esc_attr( $this->options['meta_classes'] ) . '">';
		$this->byline(
			array(
				'location' => 2,
			)
		);
		$this->titles(
			array(
				'post_subtitle' => 'off',
			)
		);
		$this->byline(
			array(
				'location' => 3,
			)
		);
		$this->excerpt( 15, false );
		$this->byline(
			array(
				'location' => 4,
			)
		);
		echo '</div>';
		echo '<a href="' . esc_url( get_the_permalink( $this->pid ) ) . '" class="overlay"></a>';
		echo '</article>';
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
		if ( 'mask' == $this->options['output_override'] ) {
			$this->mask(
				array(
					'data' => true,
				)
			);
		}
		if ( 'meta' == $this->options['output_override'] ) {
			$this->hoverer_meta();
		}

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}

	}

}
